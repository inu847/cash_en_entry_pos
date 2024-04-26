@extends('layouts.front')

@section('title')
    Product
@endsection

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" >
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

        <div class="row">
            @for ($i = 0; $i < 10; $i++)
                {{-- BUTTON MODALS --}}
                <div class="col-md-3 mb-25">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#detailProduct">
                        <img src="{{asset('/img/product.png')}}" class="image-product" alt="" width="100%">
                        <div class="card-product">
                            <div class="title-product text-center">
                                Mesin Kasir
                            </div>
                            <div class="price-product text-center">
                                Rp 5.988.000
                            </div>
                            <div class="desc-product mt-3">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 feature-desc">
                                        Android POS
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 feature-desc">
                                        High print speed (250mm/s)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 feature-desc">
                                        Portable screen
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
            @endfor
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
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <div class="row">
                        <div class="col-md-6 bg-detail-image">
                            <img src="{{asset('/img/product.png')}}" class="image-detail" alt="" width="100%">
                        </div>
                        <div class="col-md-6">
                            <div class="badge badge-custom mb-3">
                                <span class="icon-bg">
                                    <i class="fa fa-user"></i>
                                </span>
                                Premium
                            </div>
                            <div class="title-detail mb-3">Paket Bundling VX Lite (Advan Tab VX Lite) + POS */</div>
                            <div class="title-detail mb-3">Rp 5.988.000</div>
                            <div class="desc-product mt-3">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        Android POS
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 ">
                                        High print speed (250mm/s)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset('/img/check.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 ">
                                        Portable screen
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mt-2 ml-3">
                                <div class="col-md-4">
                                    <div class="fw-900 font-bold"><i class="fa fa-star"></i> 4.6</div>
                                    <div class="text-muted">Rating</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-900 font-bold">1rb+</div>
                                    <div class="text-muted">Purchase</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fw-900 font-bold">3rb+</div>
                                    <div class="text-muted">Sales</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">  
                            <button class="btn btn-outline-secondary btn-rounded btn-pcustom">Add to cart</button>
                            <button class="btn btn-primary btn-rounded btn-pcustom">Buy Now</button>
                        </div>
                    </div>

                    <div class="des-product">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate temporibus ratione magni praesentium unde corporis hic deserunt ullam aspernatur reprehenderit! Explicabo iste dolorum quisquam soluta nihil quidem modi, quas quasi?
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection