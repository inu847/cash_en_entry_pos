{{-- HEADER INVOICE --}}
{{-- <div class="row">
    <div class="col-md-12">
        <div class="invoice-header">
            <div class="invoice-from">
                <strong>{{ $sale->customer->name }}</strong>
                <p>{{ $sale->customer->address }}</p>
                <p>{{ $sale->customer->phone }}</p>
                <p>{{ $sale->customer->email }}</p>
            </div>
            <div class="invoice-to">
                <strong>{{ $sale->user->name }}</strong>
                <p>{{ $sale->user->address }}</p>
                <p>{{ $sale->user->phone }}</p>
                <p>{{ $sale->user->email }}</p>
            </div>
            <div class="invoice-date">
                <p><strong>Invoice #{{ $sale->id }}</strong></p>
                <p>{{ $sale->created_at }}</p>
            </div>
        </div>
    </div>
</div> --}}

{{-- TABLE INVOICE --}}
{{-- <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->invoiceItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->unit_cost }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->tax }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

<h1>SALE</h1>