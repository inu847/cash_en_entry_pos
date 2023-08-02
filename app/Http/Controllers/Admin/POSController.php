<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Table;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('title', 'asc')->get();
        foreach ($products as $key => $value) {
            $value['category_name'] = $value->category->name ?? null;
        }
        $warehouse = Warehouse::orderBy('name', 'desc')->get();
        $tables = Table::orderBy('number', 'asc')->get();
        foreach ($tables as $key => $value) {
            // SUM TABLE IS QTY AVAILABLE
            $table_use = Invoice::where('table_id', $value->id)->whereNull('check_out')->count();
            $value['qty_available'] = $value->capacity - $table_use;
        }
        return view('inventory.pos', compact('products', 'warehouse', 'tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse = Warehouse::orderBy('name', 'desc')->get();
        $category = ProductCategory::orderBy('name', 'desc')->get();

        return view('inventory.product.create', compact('warehouse', 'category'));
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
        // dd($data);
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('inventory/product', 'public');
            $data['image'] = $path;
        }
        $data['regular_price'] = $data['price'];
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 1;
        $create = Product::create($data);

        return redirect()->back()->with('success', 'Data berhasil di Tambahkan');
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
        $data = Product::findOrFail($id);
        $warehouse = Warehouse::orderBy('name', 'desc')->get();
        $category = ProductCategory::orderBy('name', 'desc')->get();

        return view('inventory.category.edit', compact('data', 'warehouse', 'category'));
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
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('inventory/product', 'public');
            $data['image'] = $path;
        }
        // GENERATE CODE 2 RANDOM STRING AND GET TIME
        $data['code'] = 'CAT' . time();
        $update = Product::findOrFail($id)->update($data);

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
        $destroy = Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data!');
    }

    public function updateInvoice(Request $request)
    {
        $data = $request->all();
        $invoice_items = $data['items'];
        $detail_in['discount'] = $data['discount'];
        $detail_in['customer_name'] = $data['customer_name'];
        $detail_in['table_id'] = $data['table_id'];
        $table = Table::find($data['table_id']);
        $detail_in['table_name'] = $table->number ?? null;
        $detail_in['note'] = $data['note'];
        $detail_in['invoice_code'] = 'INV' . now()->format('YmdHis').rand(10, 99);
        $bussiness = Auth::user()->bussiness->first();
        $payments = Payment::orderBy('created_at', 'asc')->get();

        return view('common.invoice', compact('invoice_items', 'detail_in', 'bussiness', 'payments'));
    }
}
