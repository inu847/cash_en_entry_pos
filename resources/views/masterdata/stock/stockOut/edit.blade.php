<form class="forms-sample" method="POST" action="{{ route('stockOut.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="" width="200">
                    <input type="file" class="form-control" name="image">
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
                        <option selected="selected" value="" >Select Product</option>
                        @foreach($ingredient as $value)
                            <option value="{{$value->id}}" @if($value->id == $data->ingredient_id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>  

                <div class="form-group">
                    <label for="qty">Qty<span class="text-red">*</span></label>
                    <input id="qty" type="number" class="form-control" name="qty" value="{{$data->qty}}" placeholder="Enter Qty" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="pic">PIC<span class="text-red">*</span></label>
                    <input id="pic" type="text" class="form-control" name="pic" value="{{$data->pic}}" placeholder="Enter PIC"{{-- ubah --}} required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="pic">PIC Phone<span class="text-red">*</span></label>
                    <input id="pic" type="number" class="form-control" name="pic_phone" value="{{$data->pic_phone}}" placeholder="Enter Pic Phone" required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="sendby">Send By<span class="text-red">*</span></label>
                    <input id="sendby" type="text" class="form-control" name="send_by" value="{{$data->send_by}}" placeholder="Enter Text"{{-- ubah --}} required="">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="received_by">Received By<span class="text-red">*</span></label>
                    <input id="received_by" type="text" class="form-control" name="received_by" value="{{$data->received_by}}" placeholder="Enter Text"{{-- ubah --}} required="">
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
