<form class="forms-sample" method="GET" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                </div>
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $data->title }}">
                    </div>
                  </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->status }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext"  value="{{ $data->type }}">
                            </div>
                        </div>

                        <div class=" row">
                          <label for="staticEmail" class="col-sm-2 col-form-label">Route</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $data->route }}">
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
            </div>
        </div>