<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingPageController extends Controller
{
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
