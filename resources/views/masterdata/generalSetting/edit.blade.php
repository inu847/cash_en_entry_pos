<form class="forms-sample" method="POST" action="{{ route('generalSetting.update', [$data->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="app_name">Name</label>
                    <input id="app_name" type="text" class="form-control" name="app_name" value="{{ $data->app_name }}" required="">
                </div>
                
                <div class="form-group">
                    <label>Logo</label>
                    <img src="{{asset('storage/'.$data->logo)}}" alt="" width="200">
                    <input type="file" class="form-control" name="logo">
                </div>

                <div class="form-group">
                    <label>Product image</label>
                    <img src="{{asset('storage/'.$data->favicon)}}" alt="" width="200">
                    <input type="file" class="form-control" name="favicon">
                </div>

                <div class="form-group">
                    <label for="address">Address</span></label>
                    <input id="address" type="text" class="form-control" name="address" value="{{ $data->address }}" required="">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</span></label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $data->phone }}" required="">
                </div>
                <div class="form-group">
                    <label for="email">Email</span></label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}" placeholder="Enter Email" required="">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</span></label>
                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $data->facebook }}" placeholder="Enter Facebook Account" required="">
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter</span></label>
                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $data->twitter }}" placeholder="Enter Twitter Account">
                </div>

                <div class="form-group">
                    <label for="instagram">Instagram</span></label>
                    <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $data->instagram }}" placeholder="Enter Twitter Account" required="">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp</span></label>
                    <input id="whatsapp" type="text" class="form-control" name="whatsapp" value="{{ $data->whatsapp }}" placeholder="Enter WhatsApp Account" required="">
                </div>
                <div class="form-group">
                    <label for="map">Map</span></label>
                    <input id="map" type="text" class="form-control" name="map" value="{{ $data->map }}" placeholder="Enter G Map" required="">
                </div>

                <div class="form-group">
                    <label>About Us</label>
                    <textarea name="about_us" class="form-control html-editor h-205" rows="10">{{ $data->about_us }} </textarea>
                </div>
                <div class="form-group">
                    <label>Terms annd Conditions</label>
                    <textarea name="terms_and_conditions" class="form-control html-editor h-205" rows="10">{{ $data->terms_and_conditions }} </textarea>
                </div>
                <div class="form-group">
                    <label>Privacy Policy</label>
                    <textarea name="privacy_policy" class="form-control html-editor h-205" rows="10">{{ $data->privacy_policy }} </textarea>
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
