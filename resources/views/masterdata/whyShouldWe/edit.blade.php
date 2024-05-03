<form class="forms-sample" method="POST" action="{{ route('whyShouldWe.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="title">Title<span class="text-red">*</span></label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $data->title }}" placeholder="Enter title" required="">
                <div class="help-block with-errors"></div>

                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control html-editor h-205" rows="10">{{ $data->description }} </textarea>
                </div>

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
                            <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>About Us</option>
                            <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sku">Route<span class="text-red">*</span></label>
                    <input id="sku" type="text" class="form-control" name="route" value="{{ $data->route }}" placeholder="Enter Route" required="">
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
