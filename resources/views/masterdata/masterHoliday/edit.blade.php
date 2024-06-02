<form class="forms-sample" method="POST" action="{{ route('masterHoliday.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="name">Name<span class="text-red">*</span></label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter Name" required="">
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="date">Date<span class="text-red">*</span></label>
                    <input id="date" type="date" class="form-control" name="date" value="{{ $data->date }}" placeholder="Enter Date" required="">
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
                    <label for="notes">Notes<span class="text-red">*</span></label>
                    <input id="notes" type="text" class="form-control" name="notes" value="{{ $data->notes }}" placeholder="Enter notes" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
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
