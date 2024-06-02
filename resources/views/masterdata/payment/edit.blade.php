<form class="forms-sample" method="POST" action="{{ route('payment.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="title">Name<span class="text-red">*</span></label>
                    <input id="title" type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter product title" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" required>
                        <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ ($data->status == 2) ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type" required>
                        <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>Cash</option>
                        <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Transfer</option>
                        <option value="3" {{ ($data->type == 3) ? 'selected' : '' }}>Ewallet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_rekening">No Rekening</label>
                    <input id="no_rekening" type="text" class="form-control" name="no_rekening" value="{{ $data->no_rekening }}" placeholder="Enter No Rekening">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control html-editor h-205" rows="10">{{ $data->description }}</textarea>
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
