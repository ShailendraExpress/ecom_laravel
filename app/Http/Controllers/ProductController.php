<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('search') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public static function cartItem()
    {
        $userId = session('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    public function cartlist()
    {
        $userId = session('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);
    }


    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    public function orderNow()
    {
        $userId = session('user')['id'];

        // ✅ Total price directly sum karna hai
        $totalPrice = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price'); // Yeh already ek number de raha hai

        return view('ordernow', compact('totalPrice')); // ✅ Compact function use karein
    }

    public function orderPlace(Request $request)
    {
        $userId = session('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();

        if ($allCart->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty!');
        }

        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->address = $request->address;
            $order->save();
        }

        // Cart empty karne ke baad delete karo
        Cart::where('user_id', $userId)->delete();

        // ✅ Flash message session me save karo
        return redirect('/order-confirmation')->with('success', 'Your order has been placed successfully!');
    }


    public function myOrders()
    {
        $userId = session('user')['id'];
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('myorders', ['orders' => $orders]);
    }

    public function orderDetail($id)
    {
        $order = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.id', $id)
            ->select('orders.*', 'products.name', 'products.price', 'products.gallery')
            ->first(); // ✅ Single record fetch karega

        if (!$order) {
            return redirect('/myorders')->with('error', 'Order not found!');
        }

        return view('order-detail', ['order' => $order]);
    }
}
