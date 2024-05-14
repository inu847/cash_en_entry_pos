@extends('layouts.front')

@section('title')
Product
@endsection

@push('css')
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
        background-color: : #9C27B0;
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
        width: 25%;
        float: left;
        position: relative;
    }

    /*Icons in the ProgressBar*/
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023";
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007";
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d";
    }

    #progressbar #confirm:before {
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

    .title-katalog{
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 21px;

        color: rgba(53, 40, 95, 0.9);
    }
    .img-katalog{
        padding: 8px;
        border: 1px solid rgba(0, 0, 0, 0.25);
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }
    .color-primary{
        color: #31245C !important;
    }
    .color-primary2{
        color: #35285FE5 !important;
    }
</style>
@endpush

@section('content')
<div class="m-3">
    <div class="card">
        <div class="row">
            <div class="col-md-12 mx-0">
                <form id="msform">
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="title-card text-left">
                            <img src="{{ asset('img/cart.png')}}" alt="" width="50">
                            Cek Keranjang Belanja Kamu
                        </div>

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
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-left pl-3">
                                        <div class="title-katalog">
                                            {{ $item->katalog->title ?? null }}
                                        </div>
                                        <img class="img-katalog" src="{{ asset('storage/'.$item->katalog->image) }}" alt="" width="70">
                                    </td>
                                    <td>Rp {{  number_format($item->katalog->price, 2) ?? null }}</td>
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
                                        Rp {{  number_format($item->qty * $item->katalog->price, 2, ',', '.') ?? null }}
                                    </td>
                                    @php
                                        $total += $item->qty * $item->katalog->price;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="color-primary2">
                                    <th class="text-left" colspan="3">Total</th>
                                    <td id="totalAll">
                                        Rp {{  number_format($total, 2, ',', '.') ?? null }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="button" name="next" class="next action-button" value="Next Step" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title">Personal Information</h2>
                            <input type="text" name="fname" placeholder="First Name" />
                            <input type="text" name="lname" placeholder="Last Name" />
                            <input type="text" name="phno" placeholder="Contact No." />
                            <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next Step" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title">Payment Information</h2>
                            <div class="radio-group">
                                <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg"
                                        width="200px" height="100px">
                                </div>
                                <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg"
                                        width="200px" height="100px">
                                </div>
                                <br>
                            </div>
                            <label class="pay">Card Holder Name*</label>
                            <input type="text" name="holdername" placeholder="" />
                            <div class="row">
                                <div class="col-9">
                                    <label class="pay">Card Number*</label>
                                    <input type="text" name="cardno" placeholder="" />
                                </div>
                                <div class="col-3">
                                    <label class="pay">CVC*</label>
                                    <input type="password" name="cvcpwd" placeholder="***" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="pay">Expiry Date*</label>
                                </div>
                                <div class="col-9">
                                    <select class="list-dt" id="month" name="expmonth">
                                        <option selected>Month</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                    <select class="list-dt" id="year" name="expyear">
                                        <option selected>Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <h2 class="fs-title text-center">Success !</h2>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                </div>
                            </div>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5>You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- progressbar -->
                    <div class="row">
                        {{-- BUTTON BACK --}}
                        <div class="col-md-2">
                            <button type="button" name="next" class="btn btn-info btn-rounded"
                                onclick="goBack()">Back</button>
                        </div>
                        <div class="col-md-8">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li>
                                <li id="personal"><strong>Personal</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                        </div>
                        {{-- BUTTON NEXT --}}
                        <div class="col-md-2">
                            <button type="button" name="next" class="btn btn-info btn-rounded"
                                onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(document).ready(function(){
        
        $(".next").click(function(){
            
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            
            //show the next fieldset
            next_fs.show(); 
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
        
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                }, 
                duration: 600
            });
        });
        
        $(".previous").click(function(){
            
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            
            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            
            //show the previous fieldset
            previous_fs.show();
        
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
        
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                }, 
                duration: 600
            });
        });
        
        $('.radio-group .radio').click(function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
        
        $(".submit").click(function(){
            return false;
        })
        
        $(document).on('input', '.qty', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');

            var count = parseInt($qty.val());
            count = (count < 1 || isNaN(count)) ? 1 : count;
            $qty.val(count);
            getTotal($id.val(), $price.val(), count);
        });

        $(document).on('click', '.plus', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');

            var count = parseInt($qty.val()) + 1;
            $qty.val(count);
            getTotal($id.val(), $price.val(), count);
        });

        $(document).on('click', '.minus', function() {
            var $id = $(this).parent().find('[name="id"]');
            var $qty = $(this).parent().find('[name="qty"]');
            var $price = $(this).parent().find('[name="price"]');
            
            var count = parseInt($qty.val()) - 1;
            count = count < 1 ? 1 : count;
            $qty.val(count);
            getTotal($id.val(), $price.val(), count);
        });

        function getTotal(id, price, qty) {
            var total = price * qty;
            total = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total);
            $('#total'+id).html(total);

            getTotalAll();
        }

        function getTotalAll() {
            var total = 0;
            $('.total').each(function() {
                var valTotal = $(this).text().replace(/[^\d,.-]/g, '');

                // Replace comma with empty string to remove it
                valTotal = valTotal.replace('.', '');
                console.log(valTotal);
                // CONVERT TO INT
                total += parseFloat(valTotal);
            });
            total = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total);
            $('#totalAll').html(total);
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