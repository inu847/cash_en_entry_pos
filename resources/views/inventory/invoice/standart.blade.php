<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('public/logo', userBussiness()->image)}}" />
    <title>{{userBussiness()->name}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }

        body{
            margin-left: 0px;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        td,th,tr,table {
            border-collapse: collapse;
        }
        
        .table-data td, .table-data th, .table-data tr{
            border-bottom-style:hidden !important;
        }

        tr {border-bottom: 1px dotted #ddd;}

        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}

        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }

        small{font-size:11px;}

        @media print {
            * {
                font-size:12px;
                line-height: 20px;
            }

            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }

            @page { margin: 1.5cm 0.5cm 0.5cm; }
            @page:first { margin-top: 0.5cm; }
            tbody::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;
            }
        }
    </style>
  </head>
<body>

@php
    \App::setLocale('en');
@endphp

<div style="max-width:400px;margin:0 auto; padding-right: 20px;">
    @if(preg_match('~[0-9]~', url()->previous()))
        @php $url = '../../pos'; @endphp
    @else
        @php $url = url()->previous(); @endphp
    @endif

    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="{{$url}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a> </td>
                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> Print</button></td>
            </tr>
        </table>
        <br>
    </div>

    <div id="receipt-data">
        <div class="centered" style="margin-bottom: 30px;">
            @if(userBussiness()->image)
                <img src="{{asset('storage/'.userBussiness()->image)}}" height="80" width="90">
            @endif
            {{-- <img src="{{ asset('logoblack.png') }}" height="45" width="120" style="filter: brightness(0);"> --}}

            <h2 style="margin-top: 0px;">{{userBussiness()->name}}</h2>

            <p>{{userBussiness()->address}}<br> Email {{userBussiness()->email}}
                <br>{{userBussiness()->phone}}
            </p>
        </div>

        <p>Date: {{$invoice->created_at->format('Y-m-d')}}<br>
            Time: {{$invoice->created_at->format("H:i:s")}}<br>
            No inv : {{$invoice->invoice_code}}<br>
            @if ($invoice->customer_name)
            Customer Name : {{$invoice->customer_name}}<br>
            @endif
        </p>
        <hr style="border-bottom:1px dotted #ddd;">
        <table class="table-data">
            <tbody>
                @foreach($invoice_details as $key => $product_sale_data)
                    <tr>
                        <td>{{ $product_sale_data->product->title ?? null }}</td>
                        <td style="width: 30%;">{{ number_format($product_sale_data->unit_price/$product_sale_data->qty) }}</td>
                        <td>x{{ $product_sale_data->qty }}</td>
                        <td>{{ number_format($product_sale_data->unit_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <tr style="border-top:1px dotted #ddd;">
                    <th colspan="2" style="text-align:left">Total</th>
                    <th style="text-align:right">{{number_format($invoice->total)}}</th>
                </tr>

                {{-- @if($invoice->tax)
                    <tr>
                        <th colspan="2" style="text-align:left">{{trans('file.Order Tax')}}</th>
                        <th style="text-align:right">{{$invoice->tax}}</th>
                    </tr>
                @endif --}}

                @if($invoice->discount)
                    @php
                        if ($invoice->discount_status == 'Percent') {
                            $invoice->amount = $invoice->amount - ($invoice->amount*$invoice->discount);
                            $invoice->change = $invoice->pay - $invoice->amount;
                        }elseif ($invoice->discount_status == 'Numeric') {
                            $invoice->amount = $invoice->amount-$invoice->discount;
                            $invoice->change = $invoice->pay - $invoice->amount;
                        }
                    @endphp
                    <tr>
                        <th colspan="2" style="text-align:left">Discount</th>
                        @if ($invoice->discount_status == 'Percent')
                            <th style="text-align:right">{{$invoice->discount*100}}%</th>
                        @else
                            <th style="text-align:right">{{number_format($invoice->discount)}}</th>
                        @endif
                    </tr>
                @endif

                
                @php
                    if ($invoice->discount) {
                        $prefix = substr($invoice->grand_total, 0, -3);
                        $sufix = substr($invoice->grand_total, -3);
                        if($sufix <= 500 && $sufix != 000){
                            $sufix = 500;
                            $invoice->grand_total = $prefix."".$sufix;
                        }elseif($sufix > 500 && $sufix <= 999){
                            $invoice->grand_total =  round($invoice->grand_total, -3);
                        }
                        $invoice->change = $invoice->pay - $invoice->grand_total;
                    }
                @endphp
                <tr>
                    <th colspan="2" style="text-align:left; padding-bottom: 10px;">Grand Total</th>
                    <th style="text-align:right">{{number_format($invoice->grand_total)}}</th>
                </tr>

                {{-- <tr>
                    @if(generalSetting()->currency_position == 'prefix')
                        <th class="centered" colspan="3">{{trans('file.In Words')}}: <span>{{$currency->code}}</span> <span>{{str_replace("-"," ",$numberInWords)}}</span></th>
                    @else
                        <th class="centered" colspan="3">{{trans('file.In Words')}}: <span>{{str_replace("-"," ",$numberInWords)}}</span> <span>{{$currency->code}}</span></th>
                    @endif
                </tr> --}}
        </table>

        <table>
            <tbody>
                <tr style="background-color:#ddd;">
                    {{-- <td style="padding: 5px;">Payment: {{$invoice->payment->name}}</td> --}}
                    <td style="padding: 5px;">Pay: {{number_format($invoice->pay)}}</td>
                    <td colspan="2" style="padding: 5px;text-align: right;">Change: {{number_format($invoice->change)}}</td>
                </tr>

                <tr><td class="centered" colspan="3">All price inclusive Tax 10%</td></tr>
                <tr style="border-bottom:0px;"><td class="centered" style="padding-bottom:0px;" colspan="3">Terimakasih sudah berbelanja <br> di {{ userBussiness()->name }}</td></tr>
                <tr><td class="centered" colspan="3" style="padding-top:0px;">Silahkan Datang Kembali</td></tr>
                
                {{-- @for ($i = 0; $i < attributeBussiness()->count(); $i++)
                    @if ($i % 2 == 0)
                        <tr style="border-bottom:0px;">
                    @endif

                    @if ($i % 2 == 1)
                        <td style="padding: 5px;width:50%">{{attributeBussiness()[$i]->name}}: {{attributeBussiness()[$i]->value}}</td>
                        @php
                            $i++;
                        @endphp
                    @else
                        <td style="padding: 5px;width:50%">{{attributeBussiness()[$i]->name}}: {{attributeBussiness()[$i]->value}}</td>
                        @php
                            $i++;
                        @endphp
                    @endif

                    @if ($i % 2 == 0)
                        </tr>
                    @endif
                @endfor --}}
                
                {{-- <td class="centered" colspan="3">
                    @php
                        echo DNS1D::getBarcodeHTML('RHC001', 'EAN13');
                    @endphp
                </td> --}}
            </tbody>
        </table>

        <!-- <div class="centered" style="margin:30px 0 50px">
            <small>{{trans('file.Invoice Generated By')}} {{userBussiness()->name}}.
            {{trans('file.Developed By')}} LionCoders</strong></small>
        </div> -->
    </div>
</div>



<script type="text/javascript">
    localStorage.clear();
    function auto_print() {
        window.print()
    }

    setTimeout(auto_print, 1000);
</script>
</body>
</html>

