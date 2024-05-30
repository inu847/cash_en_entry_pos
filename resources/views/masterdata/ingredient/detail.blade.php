<form class="forms-sample" method="GET" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                </div>
                
                <div class="form-group">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $data->name }}">
                    </div>
                  </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->status }}">
                        </div>
                    </div>
                </div>
    
                    <div class="form-group">
                        <div class=" row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" value="{{ $data->type }}">
                            </div>
                        </div>
                    </div>
        
                    

                <div class="form-group">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <p>{!! $data->description !!}</p>
                          <input type="text" readonly class="form-control-plaintext"  value="">
                        </div>
                    </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->qty }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->price }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->weight }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Uom</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->uom }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $data->note }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>