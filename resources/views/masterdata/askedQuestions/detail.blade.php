<form class="forms-sample" method="GET" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class=" row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $data->question }}">
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

                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Answer</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->answer }}">
                        </div>
                    </div>
            </div>
        </div>