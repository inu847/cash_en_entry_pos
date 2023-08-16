<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $bussiness = Auth::user()->bussiness->first();
        $warehouse = Warehouse::where('bussiness_id', $bussiness->id)->orderBy('name', 'asc')->get();
        $payment = Payment::orderBy('name', 'asc')->get();

        if ($request->has('start_date')) {
            $start_date = Carbon::parse($request->get('start_date'))->toDateString();
        }else{
            $start_date = Carbon::now()->subDays(7)->toDateString();
        }
        if ($request->has('end_date')) {
            $end_date = Carbon::parse($request->get('end_date'))->toDateString();
        }else{
            $end_date = Carbon::now()->toDateString();
        }

        $detail_in['start_date'] = Carbon::parse($start_date)->format('d-M-Y');
        $detail_in['end_date'] = Carbon::parse($end_date)->format('d-M-Y');

        $data = Invoice::where('bussiness_id', $bussiness->id)
                        ->where(function($query) use($request, $start_date, $end_date){
                            $query->whereBetween('created_at', [$start_date, $end_date]);
                            
                            if ($request->has('customer_name') && $request->get('customer_name') != null) {
                                $query->where('customer_name', 'like', '%'.$request->get('customer_name').'%');
                            }

                            if ($request->has('warehouse_id') && $request->get('warehouse_id') != null) {
                                $query->where('warehouse_id', $request->get('warehouse_id'));
                            }

                            if ($request->has('payment_id') && $request->get('payment_id') != null) {
                                $query->where('payment_id', $request->get('payment_id'));
                            }

                            if ($request->has('status') && $request->get('status') != null) {
                                $query->where('status', $request->get('status'));
                            }

                            if ($request->has('payment_id') && $request->get('payment_id') != null) {
                                $query->where('payment_id', $request->get('payment_id'));
                            }

                            if ($request->has('invoice_code') && $request->get('invoice_code') != null) {
                                $query->where('invoice_code', $request->get('invoice_code'));
                            }
                        })
                        ->orderBy('created_at', 'desc')->get();
        
        return view('inventory.sale.list', compact('data', 'warehouse', 'payment', 'detail_in'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Invoice::orderBy('title', 'desc')->get();

        return view('inventory.warehouse.create', compact('parent_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        return $this->atomic(function () use ($data) {
            $invoice['invoice_code'] = $data['invoice_code'];
            $invoice['discount'] = $data['discount'];
            $invoice['total'] = $data['total'];
            $invoice['grand_total'] = $data['total'];
            $invoice['tax'] = $data['tax'];
            $invoice['customer_name'] = $data['customer_name'];
            $invoice['table_id'] = $data['table_id'];
            $invoice['note'] = $data['note'];
            $invoice['user_id'] = auth()->user()->id;
            $invoice['payment_id'] = $data['payment_id'];
            $invoice['check_in'] = ($data['payment_id'] == 1) ? now() : null;
            $invoice['bussiness_id'] = Auth::user()->bussiness->first()->id;
            $invoice['paid'] = ($data['payment_id'] == 1) ? now() : 2;
            $invoice['type'] = $data['type'];
            $invoice['pay'] = $data['pay'];

            $crateInvoice = Invoice::create($invoice);

            foreach ($data['invoice_items_product_id'] as $key => $product_id) {
                $invoice_items = [
                    'product_id' => $product_id,
                    'qty' => $data['invoice_items_qty'][$key],
                    'unit_price' => $data['invoice_items_unit_price'][$key],
                    'name' => $data['invoice_items_name'][$key],
                    'invoice_id' => $crateInvoice->id,
                ];

                $crateInvoiceItem = InvoiceItem::create($invoice_items);
            }
            
            return redirect()->route('invoice.cetak', [$crateInvoice->invoice_code])->with('success', 'Invoice Berhasil di Buat');
        });
    }

    public function cetakInvoice($invoce_id)
    {
        $invoice = Invoice::where('invoice_code', $invoce_id)->first();
        $invoice_details = $invoice->invoiceItems;

        return view('inventory.invoice.standart', compact('invoice', 'invoice_details'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Invoice::find($id);
        
        return view('inventory.sale.detail', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Invoice::findOrFail($id);
        $parent_category = Invoice::whereNot('id', $data->id)->orderBy('title', 'desc')->get();

        return view('inventory.category.edit', compact('data', 'parent_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $update = Invoice::findOrFail($id)->update($data);

        return redirect()->back()->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Invoice::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data!');
    }
}
