<form class="forms-sample" method="POST" action="{{ route('manageTable.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="number">Number<span class="text-red">*</span></label>
                    <input id="number" type="number" class="form-control" name="number" value="{{ $data->number }}" placeholder="Enter number" required="">
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity<span class="text-red">*</span></label>
                    <input id="capacity" type="number" class="form-control" name="capacity" value="{{ $data->capacity }}" placeholder="Enter capacity" required="">
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" >
                        <option selected="selected" value="" >Select Status</option>
                            <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Available</option>
                            <option value="2" {{ ($data->status == 2) ? 'selected' : '' }}>Reserved</option>
                            <option value="3" {{ ($data->status == 3) ? 'selected' : '' }}>Occupied</option>
                            <option value="4" {{ ($data->status == 4) ? 'selected' : '' }}>Unavilable</option>
                    </select>
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
                    <label>User Name</label>
                    <select class="form-control" name="user_id" >
                        <option selected="selected" value="" >Select User</option>
                        @foreach($user as $value)
                            <option value="{{$value->id}}" @if($value->id == $data->user_id) selected @endif>{{$value->name}}</option>
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