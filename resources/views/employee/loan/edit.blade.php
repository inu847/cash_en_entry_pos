<form class="forms-sample" method="POST"  action="{{ route('emLoan.update', [$data->id]) }}" enctype="multipart/form-data">
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
          <label for="">Loan Number<span class="text-red">*</span></label>
          <input id="" type="text" class="form-control" name="loan_number" value="{{$data->loan_number}}" placeholder="" required="">
      <div class="help-block with-errors"></div>
      </div>

      <div class="form-group">
        <label for="">Loan Amount<span class="text-red">*</span></label>
        <input id="" type="text" class="form-control" name="loan_amount" value="{{$data->loan_amount}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>
      <div class="form-group">
        <label for="">Installment Amount<span class="text-red">*</span></label>
        <input id="" type="text" class="form-control" name="installment_amount" value="{{$data->installment_amount}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>
      <div class="form-group">
        <label for="">Approved By<span class="text-red">*</span></label>
        <input id="" type="text" class="form-control" name="approved_by" value="{{$data->approved_by}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>
      <div class="form-group">
        <label for="">Approved At<span class="text-red">*</span></label>
        <input id="" type="date" class="form-control" name="approved_at" value="{{$data->approved_at}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>
      <div class="form-group">
        <label for="">Declined By<span class="text-red">*</span></label>
        <input id="" type="text" class="form-control" name="declined_by" value="{{$data->declined_by}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>
      <div class="form-group">
        <label for="">Declined At<span class="text-red">*</span></label>
        <input id="" type="date" class="form-control" name="declined_at" value="{{$data->declined_at}}" placeholder="" required="">
    <div class="help-block with-errors"></div>
    </div>


<div class="form-group">
  <label>Repayment Status</label>
  <select class="form-control" name="repayment_type" >
      <option selected="selected" value="" >Select status</option>
          <option value="1"@if($data->repayment_type == '1') selected @endif>Full Payment</option>
          <option value="2"@if($data->repayment_type == '2') selected @endif>Installment</option>
  </select>
</div>
<div class="form-group">
  <label>Repayment Term</label>
  <select class="form-control" name="repayment_term" >
      <option selected="selected" value="" >Select status</option>
          <option value="1"@if($data->repayment_term == '1') selected @endif>Weekly</option>
          <option value="2"@if($data->repayment_term == '2') selected @endif>Monthly</option>
  </select>
</div>
<div class="form-group">
  <label>Repayment Status</label>
  <select class="form-control" name="repayment_status" >
      <option selected="selected" value="" >Select status</option>
          <option value="1"@if($data->repayment_status == '1') selected @endif>None</option>
          <option value="2"@if($data->repayment_status == '2') selected @endif>On Going</option>
          <option value="2"@if($data->repayment_status == '3') selected @endif>Paid</option>
          <option value="2"@if($data->repayment_status == '4') selected @endif>Canceled</option>
  </select>
</div>
<div class="form-group">
  <label>Loan Status</label>
  <select class="form-control" name="loan_status" >
      <option selected="selected" value="" >Select status</option>
          <option value="1"@if($data->loan_status == '1') selected @endif>Waiting Approval</option>
          <option value="2"@if($data->loan_status == '2') selected @endif>Approved</option>
          <option value="2"@if($data->loan_status == '3') selected @endif>Rejected</option>
  </select>
</div>
<div class="form-group">
  <label>Description</label>
  <textarea name="description" class="form-control html-editor h-205" rows="10">{{$data->description}}</textarea>
</div>
<div class="form-group">
  <label>Reason</label>
  <textarea name="reason" class="form-control html-editor h-205" rows="10">{{$data->reason}}</textarea>
</div>


{{-- BUTTON SUBMIT --}}
<div class="text-right">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
  </form>

@include('include.script')
