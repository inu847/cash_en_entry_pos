<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        if (auth()->check()) {
            $data = Cart::where('user_id', auth()->user()->id)->orWhere('session_id', Session::getId())->get();
            $cartCount = count($data);
        }else{
            $data = Cart::where('session_id', Session::getId())->get();
            $cartCount = count($data);
        }

        return view('front.product', ['data' => $data, 'cartCount' => $cartCount]);
    }
}
