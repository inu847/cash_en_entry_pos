<form class="forms-sample" method="POST" action="{{ route('voucher.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="code">Code<span class="text-red">*</span></label>
                    <input id="code" type="text" class="form-control" name="code" value="{{ $data->code }}" placeholder="Enter Code" required="">
                <div class="help-block with-errors"></div>

                </div>
                <div class="form-group">
                    <label>Bussiness Name</label>
                    <select class="form-control" name="bussiness_id" >
                        <option selected="selected" value="" >Select Bussiness</option>
                        @foreach($bussiness as $value)
                            <option value="{{$value->id}}" @if($value->id == $data->bussiness_id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" >
                        <option selected="selected" value="" >Select status</option>
                            <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ ($data->status == 2) ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type" >
                        <option selected="selected" value="" >Select type</option>
                            <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>Product</option>
                            <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_qty">Max Qty<span class="text-red">*</span></label>
                    <input id="max_qty" type="number" class="form-control" name="max_qty" value="{{ $data->max_qty }}" placeholder="Enter Answer" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="discount">Discount<span class="text-red">*</span></label>
                    <input id="discount" type="number" class="form-control" name="discount" value="{{ $data->discount }}" placeholder="Enter Discount" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="description">Description<span class="text-red">*</span></label>
                    <input id="description" type="text" class="form-control" name="description" value="{{ $data->description }}" placeholder="Enter Description" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label for="title">Title<span class="text-red">*</span></label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $data->title }}" placeholder="Enter title" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="expired-at">Expired At<span class="text-red">*</span></label>
                    <input id="expired-at" type="date" class="form-control" name="expired_at" value="{{ $data->expired_at }}" placeholder="Enter Expired Product" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="start_at">Start At<span class="text-red">*</span></label>
                    <input id="start_at" type="date" class="form-control" name="start_at" value="{{ $data->start_at }}" placeholder="Enter Started Date" required="">
                    <div class="help-block with-errors"></div>
                </div>

            </div>
        </div>

        {{-- BUTTON SUBMIT --}}
        <div class="text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

	@include('include.script')
