<form class="forms-sample" method="POST" action="{{ route('emWorkingH.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

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
                <label>Employee</label>
                <select class="form-control" name="employee_id" >
                    <option selected="selected" value="" >Select employee</option>
                    @foreach ($employee as $value)
                        <option value="{{$value->id}}" @if($value->id == $data->employee_id) selected @endif>{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Date<span class="text-red">*</span></label>
                <input id="" type="date" class="form-control" name="date" value="{{$data->date}}" required="">
            <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="">Start Time<span class="text-red">*</span></label>
                <input id="" type="time" class="form-control" name="start_time" value="{{$data->start_time}}" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">End Time<span class="text-red">*</span></label>
                <input id="" type="time" class="form-control" name="end_time" value="{{$data->end_time}}" required="">
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
