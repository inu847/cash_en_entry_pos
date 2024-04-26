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
                    <div class="col-md-5 text-right" style="margin-left: -42px;">
                        <a href="" class="btn btn-success2">Coba Sekarang</a>
                    </div>
                    <div class="col-md-7 text-left">
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
                <div class="col-md-3 mb-25">
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
                </div>
            @endfor
        </div>
    </div>
@endsection