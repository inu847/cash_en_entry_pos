<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Katalog;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
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

    public function payment()
    {
        $transfer = Payment::where("type", 2)->where("status",1)->get();
        $ewallet = Payment::where("type", 3)->where("status",1)->get();

        return view('front.components.pembayaran',compact('transfer','ewallet'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $invoice_number = 'CNE-'.now()->format('ymdhis').rand(100, 999);

        return $this->atomic(function () use ($data, $invoice_number) {
            $order['invoice_number'] = $invoice_number;
            $order['total_qty'] = $data['total_qty'];
            $order['total_price'] = $data['total_price'];
            $order['payment_id'] = $data['payment_id'];
            $order['user_id'] = 1;

            $createorder = Order::create($order);

            foreach ($data['order_item_katalog_id'] as $key => $katalog_id) {
                $katalog_detail = [
                    'katalog_id' => $katalog_id,
                    'name' => $data['d_name'][$key],
                    'price' => $data['d_price'][$key],
                    'total' => $data['d_total'][$key],
                    'qty' => $data['d_qty'][$key],
                    'order_id' => $createorder->id,
                ];

                $crateOrderDetail = OrderDetail::create($katalog_detail);
            }
            
            return redirect('/product')->with('success', 'Order Berhasil di Buat');
        });
    }
    public function invoice(string $id)
    {
        $data = order::findOrFail($id);
        $order_detail = OrderDetail::where("order_id",8)->get();

        return view('front.components.invoice', compact('data','order_detail'));
    }

    
}
