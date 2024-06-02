<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Katalog;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingPageController extends Controller
{

    public function dashboardd()
    {
        $jumlah_product = Product::count();
        $jumlah_order = Order::count();
        $jumlah_terjual = Order::sum('total_qty');
        $jumlah_customers = Order::count('name');
        return view('pages.dashboard',compact('jumlah_product','jumlah_order','jumlah_terjual','jumlah_customers'));

    }


    public function index()
    {
        return view('front.home');
    }

    public function product()
    {
        $data = Katalog::where('status', 1)->orderBy('created_at', 'desc')->get();

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->get();
        }else{
            $cart = Cart::where('session_id', Session::getId())->get();
        }
        $cartCount = count($cart);

        return view('front.product', ['data' => $data, 'cartCount' => $cartCount]);
    }

    public function productDetail(Request $request)
    {
        $id = $request->id;
        $data = Katalog::findOrFail($id);

        return view('front.components.modals_product', ['data' => $data]);
    }
}