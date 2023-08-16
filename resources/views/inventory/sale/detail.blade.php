<div class="modal-header">
    <h5 class="modal-title" id="InvoiceModalLabel">Detail Invoice</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    {{-- HEADER INVOICE --}}
    <div class="row mb-3">
        <div class="col-md-3">
            {!! \DNS2D::getBarcodeHTML(strtoupper($sale->invoice_code), 'QRCODE', 3.5, 3.5) !!}
            <div style="font-size: 15px;" class="mt-3"><strong>INVOICE #{{ $sale->invoice_code }}</strong></div>
        </div>
        <div class="col-md-3">
            <h4>Customer</h4>
            <table>
                <tr>
                    <th width="100px">Name</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->customer_name }}</td>
                </tr>
                <tr>
                    <th width="100px">Address</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->customer_address }}</td>
                </tr>
                <tr>
                    <th width="100px">Phone Number</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->customer_phone }}</td>
                </tr>
                <tr>
                    <th width="100px">Email</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->customer_email }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3">
            <h4>User</h4>
            <table>
                <tr>
                    <th width="100px">Name</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->user->name }}</td>
                </tr>
                <tr>
                    <th width="100px">Address</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->user->address }}</td>
                </tr>
                <tr>
                    <th width="100px">Phone Number</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->user->phone }}</td>
                </tr>
                <tr>
                    <th width="100px">Email</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->user->email }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-3">
            <h4>Detail Information</h4>
            <table>
                <tr>
                    <th width="150px">Status</th>
                    <td width="20px">:</td>
                    <td>{{ statusInvoice($sale->status) }}</td>
                </tr>
                <tr>
                    <th width="150px">Type</th>
                    <td width="20px">:</td>
                    <td>{{ typeInvoice($sale->type) }}</td>
                </tr>
                <tr>
                    <th width="150px">Warehouse</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->warehouse->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th width="150px">Payment Method</th>
                    <td width="20px">:</td>
                    <td>{{ $sale->payment->name ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- TABLE INVOICE --}}
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale->invoiceItems as $item)
                            <tr>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp. {{ number_format($item->unit_price) }}</td>
                                <td>Rp. {{ number_format($item->discount) }}</td>
                                <td>Rp. {{ number_format($item->qty * $item->unit_price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Subtotal</strong></td>
                            <td>Rp. {{ number_format($sale->total) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Discount</strong></td>
                            <td>Rp. {{ number_format($sale->discount) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Pay</strong></td>
                            <td>Rp. {{ number_format($sale->pay) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                            <td>Rp. {{ number_format($sale->grand_total - $sale->discount) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
    <a href="{{ route('invoice.cetak', [$sale->invoice_code]) }}" target="_blank" class="btn btn-primary">Print Invoice</a>
</div>