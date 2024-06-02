<form class="forms-sample" method="POST" action="{{ route('productInstruction.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="instruction">Instruction<span class="text-red">*</span></label>
                    <input id="instruction" type="text" class="form-control" name="instruction" value="{{ $data->instruction }}" placeholder="Enter instruction" required="">
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type" >
                        <option selected="selected" value="" >Select type</option>
                            <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>Required</option>
                            <option value="2" {{ ($data->type == 2) ? 'selected' : '' }}>Optional</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <select class="form-control" name="product_id" >
                        <option selected="selected" value="" >Select Product</option>
                        @foreach($product as $value)
                            <option value="{{$value->id}}" @if($value->id == $data->product_id) selected @endif>{{$value->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ingredient Name</label>
                    <select class="form-control" name="ingredient_id" >
                        <option selected="selected" value="" >Select Ingredient</option>
                        @foreach($ingredient as $value)
                            <option value="{{$value->id}}" @if($value->id == $data->ingredient_id) selected @endif>{{$value->name}}</option>
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