<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $data = Invoice::orderBy('created_at', 'desc')->get();

        return view('inventory.warehouse.index', ['data' => $data]);
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
        //
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
