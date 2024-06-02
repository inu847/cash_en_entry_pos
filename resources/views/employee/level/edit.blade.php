<form class="forms-sample" method="POST" action="{{ route('emLevel.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Employee image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
                </div>
    
            <div class="form-group">
                <label for="">Name<span class="text-red">*</span></label>
                <input id="" type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter Name" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">From<span class="text-red">*</span></label>
                <input id="" type="text" class="form-control" name="from" value="{{$data->from}}" placeholder="Enter Name" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">Until<span class="text-red">*</span></label>
                <input id="" type="text" class="form-control" name="until" value="{{$data->until}}" placeholder="Enter Name" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label>Bussiness</label>
                <select class="form-control" name="bussiness_id" >
                    <option selected="selected" value="" >Select Bussiness</option>
                    @foreach ($bussiness as $value)
                        <option value="{{$value->id}}" @if($value->id == $data->bussiness_id) selected @endif>{{$value->name}}</option>
                    @endforeach
                </select>
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
