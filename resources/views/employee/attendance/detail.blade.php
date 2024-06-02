<form class="forms-sample" method="GET" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Employee Name</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" value="{{ $data->employee->name }}">
                </div>
              </div>
              </div>
              <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bussiness Name</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" value="{{ $data->bussiness->name }}">
                </div>
              </div>
              </div>

                <div class="form-group">
                    <label>Clock In Photo</label>
                    <img src="{{asset('storage/'.$data->clock_in_photo)}}" alt="" width="200">
                </div>

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock In</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_in }}">
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock In Long</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_in_long }}">
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock In Lat</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_in_lat }}">
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Clock Out Photo</label>
                    <img src="{{asset('storage/'.$data->clock_out_photo)}}" alt="" width="200">
                  </div>


                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock Out</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_out }}">
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock Out Lat</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_out_lat }}">
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Clock Out Lat</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->clock_out_lat }}">
                        </div>
                    </div>
                  </div>

                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->status }}">
                        </div>
                    </div>
                       </div>
              </div>