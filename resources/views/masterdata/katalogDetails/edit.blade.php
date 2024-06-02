<form class="forms-sample" method="POST" action="{{ route('katalogDetails.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">

                <div class="form-group">
                    <label for="name">name<span class="text-red">*</span></label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter name" required="">
                <div class="help-block with-errors"></div>

                <div class="form-group">
                    <label>Katalog Name</label>
                    <select class="form-control" name="katalog_id" >
                        <option selected="selected" value="" >Select Katalog name</option>
                        @foreach($katalog as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                        @endforeach
                    </select>
                </div>

                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control html-editor h-205" rows="10">{{ $data->description }} </textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" >
                        <option selected="selected" value="" >Select status</option>
                            <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ ($data->status == 2) ? 'selected' : '' }}>Inactive</option>
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
