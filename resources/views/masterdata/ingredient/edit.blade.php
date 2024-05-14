<form class="forms-sample" method="POST" action="{{ route('ingredient.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="name">Name<span class="text-red">*</span></label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter product Name" required="">
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
                            <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>Product</option>
                            <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Service</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control html-editor h-205" rows="10">{{ $data->description }} </textarea>
                </div>

                <div class="form-group">
                    <label for="qty">Qty<span class="text-red">*</span></label>
                    <input id="qty" type="text" class="form-control" name="qty" value="{{ $data->qty }}" placeholder="Enter Product qty" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="price">Price<span class="text-red">*</span></label>
                    <input id="price" type="text" class="form-control" name="price" value="{{ $data->price }}" placeholder="Enter Product price" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="weight">Weight<span class="text-red">*</span></label>
                    <input id="weight" type="text" class="form-control" name="weight" value="{{ $data->weight }}" placeholder="Enter Product weight" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="uom">Uom<span class="text-red">*</span></label>
                    <input id="uom" type="text" class="form-control" name="uom" value="{{ $data->uom }}" placeholder="Enter Product uom" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="note">Note<span class="text-red">*</span></label>
                    <input id="note" type="text" class="form-control" name="note" value="{{ $data->note }}" placeholder="Enter Product note" required="">
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
