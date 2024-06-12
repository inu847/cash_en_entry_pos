<form class="forms-sample" method="GET" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Employee Name</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" value="{{ $data->employee->name }}">
                </div>
              </div>
              </div>
              <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bussiness Name</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" value="{{ $data->bussiness->name }}">
                </div>
              </div>
              </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Loan Number</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->loan_number }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Loan Date</label>
                        <div class="col-sm-10">
                          <input type="date" readonly class="form-control-plaintext"  value="{{ $data->loan_date }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Loan Amount</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->loan_amount }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Repayment Type</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->repayment_type }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Repayment Term</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->repayment_term }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Installment Amount</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->installment_amount }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Approved By</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->approved_by }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Approved At</label>
                        <div class="col-sm-10">
                          <input type="date" readonly class="form-control-plaintext"  value="{{ $data->approved_at }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Declined By</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->declined_by }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Declined At</label>
                        <div class="col-sm-10">
                          <input type="date" readonly class="form-control-plaintext"  value="{{ $data->declined_at }}">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Repayment Status</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->repayment_status }}">
                        </div>
                    </div>
                  </div>
                <div class="form-group">
                    <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Loan Status</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext"  value="{{ $data->loan_status }}">
                        </div>
                    </div>
                       </div>
              </div>