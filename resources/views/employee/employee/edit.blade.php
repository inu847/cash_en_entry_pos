<form class="forms-sample" method="POST" action="{{ route('employee.update', [$data->id]) }}" enctype="multipart/form-data">
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
                <label for="">Email<span class="text-red">*</span></label>
                <input id="" type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter Email" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">No Tlpn<span class="text-red">*</span></label>
                <input id="" type="number" class="form-control" name="phone" value="{{$data->phone}}" placeholder="Enter Nomor Telepon" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label>Employee image</label>
                <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="address" class="form-control h-205" rows="5">{{$data->address}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Start Date<span class="text-red">*</span></label>
                <input id="" type="date" class="form-control" name="start_date" value="{{$data->start_date}}" placeholder="Enter Tanggal Mulai" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">End Date<span class="text-red">*</span></label>
                <input id="" type="date" class="form-control" name="end_date" value="{{$data->end_date}}" placeholder="Enter Tanggal Berakhir" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="employee_position_id" >
                    <option selected="selected" value="" >Select Position</option>
                    @foreach ($employee_position as $value)
                        <option value="{{$value->id}}" @if($value->id == $data->employee_position_id) selected @endif>{{$value->name}}</option>
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
                <label>Status</label>
                <select class="form-control" name="employee_status_id" >
                    <option selected="selected" value="" >Select Status</option>
                    @foreach ($employee_status as $value)
                        <option value="{{$value->id}}" @if($value->id == $data->employee_status_id) selected @endif>{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>User</label>
                <select class="form-control" name="user_id" >
                    <option selected="selected" value="" >Select User</option>
                    @foreach ($user as $value)
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
