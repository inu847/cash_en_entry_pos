<form class="forms-sample" method="POST" action="{{ route('askedQuestions.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="title">Questions<span class="text-red">*</span></label>
                    <input id="title" type="text" class="form-control" name="question" value="{{ $data->question }}" placeholder="Enter question" required="">
                <div class="help-block with-errors"></div>

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
                    <label>Type</label>
                    <select class="form-control" name="type" >
                        <option selected="selected" value="" >Select type</option>
                            <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>General</option>
                            <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Helper</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sku">Answer<span class="text-red">*</span></label>
                    <input id="sku" type="text" class="form-control" name="answer" value="{{ $data->answer }}" placeholder="Enter Answer" required="">
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
