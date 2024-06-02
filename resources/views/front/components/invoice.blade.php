<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title','') | Cash N Entry</title>
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Include SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- jQuery Stepy CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-stepper/1.0.9/jquery.steps.css">
    <!-- jQuery Stepy JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-stepper/1.0.9/jquery.steps.min.js"></script>
    <style>
        /* invoice */
        .l1 {
            margin: -30px 0px 0px 0px;
            padding: 50px 30px 50px 30px;
            background-color: black;
        }

        .inter {
            font-family: "Inter";
        }

        p.f1 {
            font-size: 12px;
            font-weight: 400;
            line-height: 4px;
        }

        p.f2 {
            margin-top: 14px;
            font-size: 14px;
            font-weight: 400;
            line-height: 4px;
        }

        .border-tb {
            border-top: 2px solid;
            border-bottom: 2px solid;
        }

        .border-b {
            border-bottom: 3px solid;
        }

        @media screen and (max-width: 800px) {

            td.t,
            td.y {
                width: 100%;
                /* The width is 100%, when the viewport is 800px or smaller */
            }
        }

        @media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td,
            th {
                padding: 5px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 1.5cm 0.5cm 0.5cm;
            }

            @page: first {
                margin-top: 0.5cm;
            }

        }
    </style>
</head>

<body>
    <div class="printableArea">
        <div class="container inter">
            <table width="95%">
                <tr>
                    <td>
                        <img class="l1" width="120" src="{{ asset('img/lambang.png') }}">
                    </td>
                    <td class="text-end">
                        <br><br><br>
                        <h1 class="fw-bold mt-5">I N V O I C E</h1>
                        <h5 class="fw-bold">Febuari 7, 2024</h5>
                    </td>
                </tr>
            </table>
            <table class="" width="95%">
                <tr>
                    <td class="t">
                        <table class="mt-4">
                            <tr>
                                <td>
                                    <p class="fw-bold f1">inv_number </p>
                                </td>
                                <td>
                                    <p class="fw-bold f1">: {{$data->invoice_number}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold f1">Name </p>
                                </td>
                                <td>
                                    <p class="fw-bold f1">: {{$data->user->name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold f1">Status </p>
                                </td>
                                <td>
                                    <p class="fw-bold f1">: {{statusOrder($data->status)}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-bold f1">Payment </p>
                                </td>
                                <td>
                                    <p class="fw-bold f1">: {{$data->bayar->name}}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="y" width="200px">
                        <div class="card">
                            <div class="card-body">
                                <img class="" width="50" src="{{ asset('storage/'.$data->bayar->image) }}">
                            </div>
                            <div class="card-body text-bg-dark">
                                <p class="f1">12-345-678-910-112</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table table-striped border-b">
                <thead class="table-dark">
                    <tr>
                        <th class="text-light">Description</th>
                        <th class="text-light">Unit Price</th>
                        <th class="text-light">Qty</th>
                        <th class="text-light">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_detail as $item)
                    <tr>
                        <th>{{$item->name}}</th>
                        <td>{{ number_format($item->price,2,',','.')}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{ number_format($item->total,2,',','.')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="float-end mb-5" width="250px">
                <tr height="30px">
                    <td>
                        <p class="fw-bold f2">Total QTY</p>
                    </td>
                    <td>
                        <p class="fw-bold f2 text-end">{{$data->total_qty}}</p>
                    </td>
                </tr>
                <tr height="30px">
                    <td>
                        <p class="fw-bold f2">Total Amount</p>
                    </td>
                    <td>
                        <p class="fw-bold f2 text-end">{{ number_format($data->total_price,2,',','.')}} IDR</p>
                    </td>
                </tr>
                <tr height="30px">
                    <td>
                        <p class="fw-bold f2">Total Discount</p>
                    </td>
                    <td>
                        <p class="fw-bold f2 text-end">{{ number_format($data->total_discount,2,',','.')}} IDR</p>
                    </td>
                </tr>
                <tr height="30px" class="border-tb">
                    <td>
                        <p class="fw-bold f2">Gran Total</p>
                    </td>
                    <td>
                        <p class="fw-bold f2 text-end">{{ number_format($data->total_price - $data->total_discount,2,',','.')}} IDR</p>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr class="border-b">
                    <td>
                        <p class="fw-bold f2">Thank you for your order!</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container hidden-print">
        <div class="row no-print mt-3">
            <div class="col-12 text-end">
                <button type="button" onclick="auto_print()" class="btn btn-outline-dark pull-right"><i class="fa fa-print"></i> print</button>
                <button type="button" class="btn btn-dark pull-right"><i class="fa fa-share"></i> Share</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        localStorage.clear();

        function auto_print() {
            window.print()
        }

    </script>

</body>

</html>