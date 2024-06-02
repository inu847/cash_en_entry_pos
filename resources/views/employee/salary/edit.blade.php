<form class="forms-sample" method="POST" action="{{ route('emSalary.update', [$data->id]) }}" enctype="multipart/form-data">
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
                <label>Status</label>
                <select class="form-control" name="status" >
                    <option selected="selected" value="" >Select status</option>
                        <option value="1"@if($data->status == '1') selected @endif>Active</option>
                        <option value="2"@if($data->status == '2') selected @endif>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" >
                    <option selected="selected" value="" >Select type</option>
                        <option value="1"@if($data->type == '1') selected @endif>Basic</option>
                        <option value="2"@if($data->type == '2') selected @endif>Bonus</option>
                        <option value="2"@if($data->type == '3') selected @endif>Allowance</option>
                        <option value="2"@if($data->type == '4') selected @endif>Deduction</option>
                        <option value="2"@if($data->type == '5') selected @endif>Over Time</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Amount<span class="text-red">*</span></label>
                <input id="" type="time" class="form-control" name="amount" value="{{$data->amount}}" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="">Date<span class="text-red">*</span></label>
                <input id="" type="date" class="form-control" name="date" value="{{$data->date}}" required="">
            <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label>Note</label>
                <textarea name="notes" class="form-control html-editor h-205" rows="10">{{$data->notes}}</textarea>
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
