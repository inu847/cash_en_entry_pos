<form class="forms-sample" method="POST"  action="{{ route('emAttendance.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="employee_id" >
                    <option selected="selected" value="" >Select Employee Name</option>
                    @foreach ($employee as $value)
                        <option value="{{$value->id}}" @if($value->id == $data->employee_id) selected @endif>{{$value->name}}</option>
                    @endforeach
                </select>
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
              <label>Clock In Photo</label>
              <img src="{{asset('storage/'.$data->clock_in_photo)}}" alt="" width="200">
              <input type="file" class="form-control" name="clock_in_photo">
          </div>

          <div class="form-group">
            <label for="">Clock In<span class="text-red">*</span></label>
            <input id="" type="datetime-local" class="form-control" name="clock_in" value="{{$data->clock_in}}" placeholder="Enter Clock In" required="">
        <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label for="">Clock In Long<span class="text-red">*</span></label>
          <input id="" type="text" class="form-control" name="clock_in_long" value="{{$data->clock_in_long}}" placeholder="Enter Clock In Long" required="">
      <div class="help-block with-errors"></div>
      </div>

      <div class="form-group">
        <label for="">Clock In Lat<span class="text-red">*</span></label>
        <input id="" type="text" class="form-control" name="clock_in_lat" value="{{$data->clock_in_lat}}" placeholder="Enter Clock In Lat" required="">
    <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
      <label>Clock Out Photo</label>
      <img src="{{asset('storage/'.$data->clock_out_photo)}}" alt="" width="200">
      <input type="file" class="form-control" name="clock_out_photo">
  </div>

  <div class="form-group">
    <label for="">Clock Out<span class="text-red">*</span></label>
    <input id="" type="datetime-local" class="form-control" name="clock_out" value="{{$data->clock_out}}" placeholder="Enter Clock Out" required="">
<div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <label for="">Clock Out Long<span class="text-red">*</span></label>
  <input id="" type="text" class="form-control" name="clock_out_long" value="{{$data->clock_out_long}}" placeholder="Enter Clock Out Long" required="">
<div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <label for="">Clock Out Lat<span class="text-red">*</span></label>
  <input id="" type="text" class="form-control" name="clock_out_lat" value="{{$data->clock_out_lat}}" placeholder="Enter Clock Out Lat" required="">
<div class="help-block with-errors"></div>
</div>

<div class="form-group">
  <label>Status</label>
  <select class="form-control" name="status" >
      <option selected="selected" value="" >Select status</option>
          <option value="1"@if($data->status == '1') selected @endif>On Time</option>
          <option value="2"@if($data->status == '2') selected @endif>Half Day</option>
          <option value="2"@if($data->status == '2') selected @endif>Zero Wage</option>
  </select>
</div>

{{-- BUTTON SUBMIT --}}
<div class="text-right">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
  </form>

@include('include.script')
