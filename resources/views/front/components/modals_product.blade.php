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
            <div class="title-detail mb-3">{{ $data['title'] }}</div>
            <div class="title-detail mb-3">Rp {{ number_format($data['price']) }}</div>
            <div class="desc-product mt-3">
                @foreach ($data->katalogDetail as $detail)
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img src="{{asset('/img/check.svg')}}" alt="">
                        </div>
                        <div class="col-md-10">
                            {{ $detail->name }}
                        </div>
                    </div>
                @endforeach
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
            <button type="button" class="btn btn-outline-secondary btn-rounded btn-pcustom addCart" data-id="{{$data['id']}}" data-price="{{$data['price']}}">Add to cart</button>
            <button class="btn btn-primary btn-rounded btn-pcustom buyNow" data-id="{{$data['id']}}" data-price="{{$data['price']}}">Buy Now</button>
        </div>
    </div>

    <div class="des-product">
        {!! $data['description'] !!}
    </div>
</div>