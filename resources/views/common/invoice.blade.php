
<div class="row invoice-info">
    {{-- <div class="col-sm-12">
        <h4 class="text-right">Invoice {{ '#'.$detail_in['invoice_code'] }}</h4>
    </div> --}}
    <div class="col-sm-3  invoice-col">
        From
        <table>
            <tr>
                <th width="70px">Bussiness</th>
                <td width="10px">:</td>
                <td>{{ $bussiness->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>:</td>
                <td>{{ $bussiness->phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $bussiness->email }}</td>
            </tr>
        </table>
    </div>
    <div class="col-sm-3 invoice-col">
        To
        <table>
            <tr>
                <th colspan="3">{{ $detail_in['customer_name'] }}</th>
            </tr>
            <tr>
                <th width="50px">Table</th>
                <td width="10px">:</td>
                <td>{{ $detail_in['table_name'] }}</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>:</td>
                <td>{{ $detail_in['note'] }}</td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="col-sm-3 invoice-col text-right">
        {{-- IMAGE BUSSINESS --}}
        <img src="{{ asset('storage/'.$bussiness->logo) }}" alt="" width="100px">
    </div>
</div>

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-hover">
            <thead style="background-color: #31245C;">
                <tr>
                    <th class="wp-10 text-white font-weigh-bold">SL</th>
                    <th class="wp-40 text-white font-weigh-bold">Product</th>
                    <th class="wp-20 text-white font-weigh-bold">Unit Price</th>
                    <th class="wp-15 text-white font-weigh-bold">Qty</th>
                    <th class="wp-15 text-right text-white font-weigh-bold">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                    $grandDiscount = 0;
                @endphp
                @foreach($invoice_items as $key => $product)
                @php

                $subtotal = $product['quantity'] * ($product['price']);
                $grandTotal += $subtotal;
                @endphp
                <tr>
                    <td>{{($key +  1)}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{number_format($product['price'])}}</td>
                    <td>{{$product['quantity']}}</td>
                    <td class="text-right">{{number_format($subtotal)}}</td>
                </tr>

                {{-- FORM CREATE --}}
                <input type="hidden" name="invoice_items_name[]" value="{{ $product['name'] }}">
                <input type="hidden" name="invoice_items_qty[]" value="{{ $product['quantity'] }}">
                <input type="hidden" name="invoice_items_unit_price[]" value="{{ $product['price'] }}">
                {{-- <input type="hidden" name="invoice_items_discount[]" value="{{ $product['discount'] }}"> --}}
                <input type="hidden" name="invoice_items_product_id[]" value="{{ $product['product_id'] }}">
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="lead">Payment Methods:</label>
            <select name="payment_id" id="" class="form-control">
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="lead">Type:</label>
            <select name="type" id="" class="form-control">
                <option value="1">Dine In</option>
                <option value="2">Reservation</option>
                <option value="3">Take Away</option>
                <option value="4">Delivery</option>
            </select>
        </div>

        <div class="form-group">
            <label class="lead">Status:</label>
            <select name="status" id="" class="form-control">
                <option value="1">Pending</option>
                <option value="2">Confirmed</option>
                <option value="3">Cancelled</option>
            </select>
        </div>

        {{-- <div class="alert alert-secondary mt-20">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div> --}}
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <div class="table-responsive">
            @php
                $grandTotal = $grandTotal - $detail_in['discount'];
                $taxAmount = $grandTotal * 0.1;
                $grandTotalWithTax = $grandTotal + $taxAmount;
                $change = $detail_in['pay'] - $grandTotalWithTax;
            @endphp
            <table class="table">
                <tbody>
                    <tr>
                        <th class="th-50">Subtotal:</th>
                        <td class="text-right">{{number_format($grandTotal)}}</td>
                    </tr>
                    <tr>
                        <th class="th-50">Discount:</th>
                        <td class="text-right">{{number_format($detail_in['discount'])}}</td>
                    </tr>
                    <tr>
                        <th>Tax (10%)</th>
                        <td class="text-right">{{number_format($taxAmount)}}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td class="text-right">{{number_format($grandTotalWithTax)}}</td>
                    </tr>
                    <tr>
                        <th>Pay:</th>
                        <td class="text-right">{{ number_format($detail_in['pay']) }}</td>
                    </tr>
                    <tr>
                        <th>Change:</th>
                        <td class="text-right">{{ number_format($change) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- FORM CREATE --}}
<input type="hidden" name="discount" value="{{ $detail_in['discount'] }}">
<input type="hidden" name="total" value="{{ $grandTotal }}">
<input type="hidden" name="grand_total" value="{{ $grandTotalWithTax }}">
<input type="hidden" name="tax" value="{{ $taxAmount }}">
<input type="hidden" name="customer_name" value="{{ $detail_in['customer_name'] }}">
<input type="hidden" name="table_id" value="{{ $detail_in['table_id'] }}">
<input type="hidden" name="note" value="{{ $detail_in['note'] }}">
<input type="hidden" name="invoice_code" value="{{ $detail_in['invoice_code'] }}">
<input type="hidden" name="pay" value="{{ $detail_in['pay'] }}">
