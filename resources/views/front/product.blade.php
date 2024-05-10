@extends('layouts.front')

@section('title')
    Product
@endsection

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" >
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Include SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">

    <style>
        .title1{
            color: #fff;
            font-size: 40px;
            font-weight: 400;
            /* FONT Russo One */
            font-family: 'Russo One', sans-serif;
            line-height: 1.2;
            margin: 80px 50px 30px;
        }

        .title2{
            color: #fff;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
            margin: 0px 50px 30px 50px;
        }
        .title-desc{
            color: rgba(49, 36, 92, 1);
            font-family: 'Russo One', sans-serif;
            font-size: 40px;
        }
        .btn-success2{
            border-radius: 20px;
            padding: 20px 30px;
            line-height: 0.2;
            background-color: rgba(35, 221, 31, 1);
        }
        .btn-outline-light{
            border-radius: 20px;
            padding: 20px 30px;
            line-height: 0.2;
        }
        .card-product{
            border-radius: 10px;
            background-color: rgba(114, 61, 218, 1);
            padding: 10px;
            margin-top: -100px;
            padding-top: 125px;
            height: 300px;
        }
        .image-product{
            width: 80%;
            margin-left: 25px;
            margin-right: 25px;
        }
        .title-product{
            color: #fff;
            font-family: 'Russo One', sans-serif;
            font-size: 20px;
        }
        .price-product{
            color: #fff;
            font-family: 'Russo One', sans-serif;
            font-size: 20px;
        }
        .feature-desc{
            color: #FFFFFF;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
        }
        .mb-25{
            margin-bottom: 25px;
        }
        .input-group .input-group-prepend .input-group-text{
            background-color: #ffffff00;
            border-radius: 5px;
            border: 1px solid #bfbfbf;
            border-right: none;
            color: #575757;
        }
        .input-group input{
            border-left: none;
        }
        .input-group-prepend{
            margin-right: -10px;
        }
        .badge-custom{
            background: linear-gradient(90deg, #674CC2 0%, rgba(49, 36, 92, 0.91) 100%);
            border-radius: 15px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            padding: 20px 40px;

            color: #FFFFFF;
        }
        .title-detail{
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
        }
        .icon-bg{
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            padding: 5px;
            font-size: 17px;
        }
        .btn-pcustom{
            padding: 25px 40px;
            line-height: 4px;
            width: 180px;
            font-size: 20px;
            font-weight: 900;
        }
        .btn-primary{
            background-color: #31245C;
        }
        .image-detail{
            width: 90%;
            margin: 25px;
        }
        .bg-detail-image{
            background: linear-gradient(#723DDA, #31245C);
            border-radius: 10px;
        }
        .des-product{
            font-family: 'Inter';
            font-style: normal;
            font-weight: 900;
            font-size: 15px;
            line-height: 25px;
            margin-top: 20px;
        }
        .badge-cart{
            right: -7px;
            position: absolute;
            top: -4px;
            padding: 3px;
            width: 17px;
            font-size: 11px;
            font-weight: 800;
            color: #fff;
            border-radius: 100px;
            -webkit-border-radius: 100px;
            background-color: red;
        }
        .icon-cart{
            font-size: 25px;
        }
        .addtocart{
            text-align: center;
        }
        .btn-addToCart{
            border-radius: 50%;
            padding: 7px 15px;
            font-size: 20px;
            background-color: #31245C;
            color: white;
            line-height: 0.1;
        }
        .btn-addToCart:hover, .btn-addToCart:focus, .btn-addToCart:active{
            color: white;
            background-color: #31245C;
        }
    </style>
@endpush

@section('content')
    <div id="beranda" class="bg-banner">
        <div class="row">
            <div class="col-md-6">
                <div class="title1">
                    Temukan Solusi Praktis <br>
                    Untuk Manajemen <br>
                    Keuangan Anda
                </div>

                <div class="title2">
                    Tingkatkan Efisiensi bisnis anda dengna mesin kasir canggih kami <br>
                    yang dapat mengelola transaksi dengna mudha dna cepat.
                </div>

                <div class="row">
                    <div class="col-md-3 text-right" style="margin-left: 40px;">
                        <a href="" class="btn btn-success2">Coba Sekarang</a>
                    </div>
                    <div class="col-md-8 text-left">
                        <a href="" class="btn btn-outline-light">Konsultasi Dulu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('/img/product.png')}}" width="450" style="margin-top: 60px;">
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row mb-25">
            <div class="col-md-8">
                <div class="title-desc">Daftar Perangkat</div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="row">
                    <div class="col-md-1 text-right p-1 mr-2">
                        <a href="{{ route('cart.index') }}">
                            <i class="ik ik-shopping-cart icon-cart"></i>
                            <span class="badge badge-cart" id="cartCount">{{ ($cartCount != 0) ? $cartCount : '+' }}</span>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="ik ik-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control global_filter" id="global_filter" placeholder="Cari Perangkat">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $item)
                {{-- BUTTON MODALS --}}
                <div class="col-md-3 mb-25">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#detailProduct" class="detailProduct" data-id="{{$item['id']}}">
                        <img src="{{ asset('storage/'.$item['image']) }}" class="image-product" alt="" width="100%">
                        <div class="card-product">
                            <div class="title-product text-center">
                                {{ $item['title'] }}
                            </div>
                            <div class="price-product text-center">
                                Rp {{ number_format($item['price']) }}
                            </div>
                            <div class="desc-product mt-3">
                                @foreach ($item->katalogDetail as $detail)
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <img src="{{asset('/img/check.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-10 feature-desc">
                                            {{ $detail->name }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </a>
                    <div class="addtocart">
                        <a class="btn-addToCart addCart" href="javascript:void(0)" data-id="{{$item['id']}}" data-price="{{$item['price']}}">+</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CHECKOUT MODAL --}}
    <div class="modal fade edit-layout-modal pr-0 " id="cart" tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartLabel">{{ __('Add bussiness')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>

    {{-- DETAIL PRODUCT --}}
    <div class="modal fade " id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="detailProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" id="bodyProduct">
                
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('js/alerts.js')}}"></script>

    <script>
        $(document).on('click', '.detailProduct', function(){
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('front.productDetail') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                success: function(data) {
                    $('#bodyProduct').html(data);
                }
            })
        });
        
        $(document).on('click', '.addCart', function(){
            var id = $(this).data('id');
            console.log(id);

            // CONFIRM WITH SWEET ALERT
            Swal.fire({
                title: 'Are you sure?',
                text: "Apakah ingin menambahkan produk ini ke keranjang?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    addToCart(id);
                }
            })
        });

        $(document).on('click', '.buyNow', function(){
            var id = $(this).data('id');
            console.log(id);

            // CONFIRM WITH SWEET ALERT
            Swal.fire({
                title: 'Are you sure?',
                text: "Apakah ingin membeli produk ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    addToCart(id);
                    // DELAY
                    setTimeout(() => {
                        window.location.href = "{{ route('cart.index') }}";
                    }, 1000);
                }
            })
        });

        function addToCart(id) {
            $('.addToCart').attr('disabled', 'disabled');
            $('.addToCart').html('<i class="fa fa-spinner fa-spin"></i>');

            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    katalog_id: id,
                },
                success: function(data) {
                    $('#addToCart').removeAttr('disabled');
                    $('#cartCount').html(data.cartCount);

                    showSuccessToast(data.message);
                },
                error: function(data) {
                    $('#addToCart').removeAttr('disabled');
                    showDangerToast(data.message);
                }
            });
        }
    </script>
@endpush