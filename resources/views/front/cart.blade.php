@extends('layouts.front')

@section('title')
Product
@endsection

@push('css')
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
    /*Background color*/
    #grad1 {
        background-color: #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA);
    }

    /*form styles*/
    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E;
    }

    /*Blue Buttons*/
    #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
    }

    /*Previous Buttons*/
    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
    }

    /* bg img */
    .img1 {
        margin: 20px;
        padding: 30px;
        background-color: #31245C;
        border-radius: 50%;
    }

    /*Dropdown List Exp Date*/
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px;
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue;
    }

    /*The background card*/
    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative;
    }

    /*FieldSet headings*/
    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
    }

    #progressbar .active {
        color: #000000;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 33.3333333%;
        float: left;
        position: relative;
    }

    /*Icons in the ProgressBar*/
    #progressbar #service:before {
        font-family: FontAwesome;
        content: "\f023";
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d";
    }

    #progressbar #checkout:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    /*ProgressBar before any progress*/
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before,
    #progressbar li.active:after {
        background: skyblue;
    }

    /*Imaged Radio Buttons*/
    .radio-group {
        position: relative;
        margin-bottom: 25px;
    }

    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px;
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
    }

    /*Fit image in bootstrap div*/
    .fit-image {
        width: 100%;
        object-fit: cover;
    }

    .title-card {
        padding: 15px;
        border: 1px solid black;
        border-radius: 10px;
        background-color: #F1F1F180;
        margin: 10px;

        font-family: 'Poppins';
        font-style: normal;
        font-weight: 800;
        font-size: 20px;
        line-height: 36px;

        color: #31245C;
    }

    .title-katalog {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 21px;

        color: rgba(53, 40, 95, 0.9);
    }

    .img-katalog {
        padding: 8px;
        border: 1px solid rgba(0, 0, 0, 0.25);
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    .color-primary {
        color: #31245C !important;
    }

    .color-primary2 {
        color: #35285FE5 !important;
    }

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
        font-size: 14px;
        font-weight: 400;
        line-height: 4px;
    }
</style>
@endpush

@section('content')
<div class="m-3">
    <div class="card">
        <div class="row">
            <div class="col-md-12 mx-0">
                <form id="msform" method="post" action="{{ url('order/store') }}">
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="title-card text-left">
                            <img src="{{ asset('img/cart.png')}}" alt="" width="50">
                            Cek Keranjang Belanja Kamu
                        </div>
                        <a type="button" class="btn btn-primary" href="{{ url('/order/invoice/8')}}">ppppppppp</a>

                        <table class="table table-hover m-3 color-primary">
                            <thead>
                                <tr>
                                    <th class="fw-bold text-left">Product</th>
                                    <th class="fw-bold">Harga</th>
                                    <th class="fw-bold">Jumlah</th>
                                    <th class="fw-bold">Total</th>
                                </tr>
                            </thead>
                            <tbody class="color-primary2">
                                @php
                                $total = 0;
                                $totalqty = 0;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-left pl-3">
                                        <div class="title-katalog">
                                            {{ $item->katalog->title ?? null }}
                                        </div>
                                        <img class="img-katalog" src="{{ asset('storage/'.$item->katalog->image) }}" alt="" width="70">
                                    </td>
                                    <td>{{ number_format($item->katalog->price, 2) ?? null }} IDR</td>
                                    <td width="150px">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group input-group-button">
                                                    <div class="input-group-prepend minus">
                                                        <button class="btn btn-primary" type="button">-</button>
                                                    </div>
                                                    <input type="number" name="qty" value="{{ $item->qty }}" class="form-control qty" placeholder="Both side addons">

                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="price" value="{{ $item->price }}">
                                                    <input type="hidden" name="total" value="{{ $item->qty * $item->katalog->price }}">
                                                    <div class="input-group-append plus">
                                                        <button class="btn btn-primary" type="button">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="total{{ $item->id }}" class="total">
                                        {{ number_format($item->qty * $item->katalog->price, 2, ',', '.') ?? null }} IDR
                                    </td>
                                    @php
                                    $total += $item->qty * $item->katalog->price;
                                    $totalqty += $item->qty;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="color-primary2">
                                    <th class="text-left" colspan="3">Total</th>
                                    <td id="totalAll">
                                        {{ number_format($total, 2, ',', '.') ?? null }} IDR
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="button" name="next" class="next action-button" value="Next Step" />
                    </fieldset>
                    <fieldset>
                        <div class="m-5">
                            <div class="card text-start mb-5">
                                <div class="row g-0">
                                    <div class="col-md-3" id="imagepayment">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body mx-4 text-secondary">
                                            <h4 class="mt-2">Metode Pembayaran</h4>
                                            <h5 id="namepayment">-</h5>
                                            <br>
                                            <h5>Fee</h5>
                                            <h5>Rp.-</h5>
                                            <br>
                                            <h6>Lakukan pembayaran sebesar 15.000 dengan GoPay? atau</h6>
                                            <div class="d-grid gap-2">
                                                <a href="javascript::void(0)" onclick="payment()" class="btn btn-primary">Pilih Metode Pembayaran</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="npwp">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-primary">Anda membutuhkan faktur pajak?</h5>
                                        <img class="" src="{{ asset('img/contract 1.png') }}" alt="" width="120">
                                        <div class="d-grid gap-2 col-1 mx-auto mt-3">
                                            <a href="javascript::void(0)" onclick="npwp()" class="btn btn-success">Gunakan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                    </fieldset>
                    <fieldset>
                        <div class="row mx-5 mt-5">
                            <div class="col-sm-6 text-start">
                                <p class="fw-bold h5">Keterangan</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="fw-bold h5">Harga</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="fw-bold h5">Jumlah</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="fw-bold h5">Total</p>
                            </div>
                        </div>
                        @foreach ($data as $item)
                        <div class="row mx-5 mb-1">
                            <div class="col-sm-6 text-start" id="item">
                                <h5>{{ $item->katalog->title ?? null }}</h5>
                                <img class="img-thumbnail" src="{{ asset('storage/'.$item->katalog->image) }}" alt="" width="70">
                            </div>
                            <div class="col-sm-2">
                                <h6>{{ number_format($item->katalog->price, 2) ?? null }} IDR</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 id="checkoutQyt{{$item->id}}">{{ number_format($item->qty) ?? null }}</h6>
                            </div>
                            <div class="col-sm-2">
                                <h6 id="checkoutTotal{{ $item->id }}">{{ number_format($item->qty * $item->katalog->price, 2, ',', '.') ?? null }} IDR</h6>
                            </div>
                        </div>
                        @endforeach
                        <div class="row bg-secondary mx-5 p-1 rounded mt-4">
                            <div class="col text-start mt-1 fw-bold">Total Order</div>
                            <div class="col text-end mt-1">
                                <h6 id="checkoutTotalAll">
                                    {{ number_format($total, 2, ',', '.') ?? null }} IDR
                                </h6>
                            </div>
                        </div>
                        <div class="row mx-5 p-1 rounded">
                            <div class="col text-start mt-1">Sub Total</div>
                            <div class="col text-end mt-1">
                                <h6 id="checkoutTotalAlll">
                                    {{ number_format($total, 2, ',', '.') ?? null }} IDR
                                </h6>
                            </div>
                        </div>
                        <div class="row mx-5 p-1 rounded">
                            <div class="col text-start mt-1">PPN</div>
                            <div class="col text-end mt-1">
                                <h6 id="tax">
                                    {{ number_format(0.11*$total, 2, ',', '.') ?? null }} IDR
                                </h6>
                            </div>
                        </div>
                        <div class="row mx-5 p-1 rounded">
                            <div class="col text-start mt-1">Free</div>
                            <div class="col text-end mt-1">
                                <h6 id="totalAll">
                                    0,00 IDR
                                </h6>
                            </div>
                        </div>
                        <div class="row bg-secondary mx-5 p-1 rounded">
                            <div class="col text-start mt-1 fw-bold">Total</div>
                            <div class="col text-end mt-1">
                                <h6 id="grandtotal">
                                    {{ number_format(0.11*$total+$total, 2, ',', '.') ?? null }} IDR
                                </h6>
                            </div>
                        </div>
                        <div class="row mx-5 mt-5">
                            @csrf
                            <input id="idpayment" type="number" name="payment_id" hidden>
                            <input id="total_qty" type="number" name="total_qty" hidden value="{{ number_format($totalqty) ?? null }}">
                            <input id="total_price" type="number" name="total_price" hidden value="{{ $total ?? null }}">
                            @foreach($data as $key => $item)
                            <input id="d_name" type="text" name="d_name[]" hidden value="{{ $item->katalog->title ?? null }}">
                            <input id="d_price" type="number" name="d_price[]" hidden value="{{ $item->katalog->price ?? null }}">
                            <input id="d_total{{ $item->id }}" type="number" name="d_total[]" hidden value="{{ $item->qty * $item->katalog->price ?? null }}">
                            <input id="d_qty{{ $item->id }}" type="number" name="d_qty[]" hidden value="{{ $item->qty ?? null }}">
                            <input id="d_katalog" type="number" name="d_katalog[]" hidden value="{{ $item->katalog->id ?? null }}">
                            <input type="hidden" name="order_item_katalog_id[]" value="{{ $item->katalog->id ?? null }}">
                            @endforeach
                            <button type="submit" class="btn btn-success btn-lg">
                                CHECKOUT
                            </button>
                        </div>
                    </fieldset>

                    <!-- progressbar -->
                    <div class="row">
                        {{-- BUTTON BACK --}}
                        <div class="col-md-2">
                            <button type="button" name="next" class="btn btn-info btn-rounded" onclick="goBack()">Back</button>
                        </div>
                        <div class="col-md-8">
                            <ul id="progressbar">
                                <li class="active" id="service"><strong>service</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="checkout"><strong>Checkout</strong></li>
                            </ul>
                        </div>
                        {{-- BUTTON NEXT --}}
                        <div class="col-md-2">
                            <button type="button" name="next" class="btn btn-info btn-rounded" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_pembayaran" tabindex="-1" role="dialog" aria-labelledby="modal_pembayaran_dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_pembayaran_dataLabel">Payment Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="formPembayaran">
                ...
            </div>
        </div>
    </div>
</div>

<!-- Preview Invoice Modal -->
<div class="modal fade edit-layout-modal pr-0 " id="InvoiceModal" role="dialog" aria-labelledby="InvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog mw-50" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="detailInvoice"></div>
                    <div class="row no-print">
								<div class="col-12">
									<button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
									<button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
								</div>
							</div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function payment() {
        $.ajax({
            url: '/paymentt',
            type: 'GET',
            success: function(data) {
                $('#formPembayaran').html(data);
                $('#modal_pembayaran').modal('show');
                actionCloseModals();
            }
        })
    }

    function pembayarann(id, name, image) {

        var $img = `<img src="{{ asset('storage/` + image + `') }}" class="img-fluid rounded-start m-4" alt="...">`;

        $('#imagepayment').html($img);
        $('#namepayment').text(name);
        $('#idpayment').val(id);
    }

    function npwp() {
        var tm = `                            <div class="card text-start mb-5">
                                <div class="row g-0">
                                    <div class="col-md-5" id="">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body mx-4 text-secondary">
                                            <div class="form-group">
                                                <label for="">Nomor NPWP<span class="text-red">*</span></label>
                                                <input id="" type="text" class="form-control" name="name" value="" placeholder="Nomor NPWP" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Perusahaan / Organisasi<span class="text-red">*</span></label>
                                                <input id="" type="text" class="form-control" name="name" value="" placeholder="Nama Perusahaan / Organisasi" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat<span class="text-red">*</span></label>
                                                <textarea name="address" class="form-control h-205" rows="2" placeholder="Alamat Perusahaan / Organisasi"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a href="javascript::void(0)" onclick="batalnpwp()" class="btn btn-danger">Batal Menggunakan NPWP</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

        $('#npwp').html(tm);
    }

    function batalnpwp() {
        var pp = `<div class="row">
                                    <div class="col-12">
                                        <h5 class="text-primary">Anda membutuhkan faktur pajak?</h5>
                                        <img class="" src="{{ asset('img/contract 1.png') }}" alt="" width="120">
                                        <div class="d-grid gap-2 col-1 mx-auto mt-3">
                                            <a href="javascript::void(0)" onclick="npwp()" class="btn btn-success">Gunakan</a>
                                        </div>
                                    </div>
                                </div>`;

        $('#npwp').html(pp);
    }

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(document).ready(function() {

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function() {
            return false;
        })



        $(document).on('input', '.qty', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');

            var count = parseInt($qty.val());
            count = (count < 1 || isNaN(count)) ? 1 : count;
            $qty.val(count);

            $('#d_qty' + $id.val()).val(count);
            $('#checkoutQyt' + $id.val()).text(count);
            getTotal($id.val(), $price.val(), count);
        });

        $(document).on('click', '.plus', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');
            var count = parseInt($qty.val()) + 1;
            $qty.val(count);

            $('#d_qty' + $id.val()).val(count);
            $('#checkoutQyt' + $id.val()).text(count);
            getTotal($id.val(), $price.val(), count);
        });

        $(document).on('click', '.minus', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');

            var count = parseInt($qty.val()) - 1;
            count = count < 1 ? 1 : count;
            $qty.val(count);

            $('#d_qty' + $id.val()).val(count);
            $('#checkoutQyt' + $id.val()).text(count);
            getTotal($id.val(), $price.val(), count);
        });

        function getTotal(id, price, qty) {
            var total = price * qty;
            $('#d_total' + id).val(total);
            total = new Intl.NumberFormat("ru-RU", {
                style: "currency",
                currency: "IDR",
            }).format(total);

            $('#total' + id).html(total);
            $('#checkoutTotal' + id).text(total);

            getTotalAll();
        }

        function getTotalAll() {
            var total = 0;
            var totalqty = 0;

            $('.total').each(function() {
                var valTotal = $(this).text().replace(/[^\d,.-]/g, '');

                // Replace comma with empty string to remove it
                valTotal = valTotal.replace('.', '');
                // console.log(valTotal);
                // CONVERT TO INT
                total += parseFloat(valTotal);
            });
            $('.qty').each(function() {
                var l = $(this).val();
                totalqty += parseFloat(l);
            });

            var ppn = total * 0.11;
            var grandtotal = total + ppn;
            $('#total_price').val(grandtotal);

            ppn = new Intl.NumberFormat('ru-RU', {
                style: "currency",
                currency: "IDR",
            }).format(ppn);
            total = new Intl.NumberFormat('ru-RU', {
                style: "currency",
                currency: "IDR",
            }).format(total);
            grandtotal = new Intl.NumberFormat('ru-RU', {
                style: "currency",
                currency: "IDR",
            }).format(grandtotal);

            $('#totalAll').html(total);
            $('#checkoutTotalAll').text(total);
            $('#checkoutTotalAlll').text(total);
            $('#grandtotal').text(grandtotal);
            $('#tax').text(ppn);
            $('#total_qty').val(totalqty);
        }
    });

    function nextPrev(n) {
        // GET PARENT $(".next") + n
        // $(".next").parent().next().show();
    }

    function goBack() {
        // $(".previous").parent().prev().show();
    }
</script>
@endpush