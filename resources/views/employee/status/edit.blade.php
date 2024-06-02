<form class="forms-sample" method="POST" action="{{ route('emStatus.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

            <div class="form-group">
                <label for="">Name<span class="text-red">*</span></label>
                <input id="" type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter Name" required="">
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
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" >
                    <option selected="selected" value="" >Select status</option>
                        <option value="1"@if($data->status == '1') selected @endif>Active</option>
                        <option value="2"@if($data->status == '2') selected @endif>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control html-editor h-205" rows="10">{{$data->description}}</textarea>
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
