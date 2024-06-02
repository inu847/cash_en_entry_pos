<style>
    .nav-pills {
        border: 1px solid #0d6efd;
        border-radius: 7px;
    }

    li {
        width: 50%;
    }
</style>

<div class="row">
    <div class="col-sm-12 mx-auto d-grid gap-2">
        <ul class="nav nav-pills custom-pills text-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Pembayaran Instan')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Transfer Bank')}}</a>
            </li>
        </ul>
        <h6 class="text-center mb-5 mt-4">Gunakan metode pembayaran instan <br>agar layanan<span class="fw-bold"> langsung aktif </span>tanpa perlu konfirmasi</h6>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    @foreach($ewallet as $item)
                    <div class="col">
                        <input type="image" class="img-fluid" onclick="pembayarann({{$item->id}},'{{$item->name}}','{{$item->image}}')" value="{{$item->id}}" src="{{ asset('storage/'.$item->image) }}" alt="Submit">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    @foreach($transfer as $item)
                    <div class="col-3">
                        <input type="image" name="id" onclick="pembayarann({{$item->id}},'{{$item->name}}','{{$item->image}}')" class="img-fluid" id="id" value="{{$item->id}}" src="{{ asset('storage/'.$item->image) }}" alt="Submit">
                        <input type="text" id="namapembayaran{{$item->id}}" value="{{$item->name}}" hidden>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
