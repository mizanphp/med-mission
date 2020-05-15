<div class="col-lg-7">
    <div class="form-group">
        <label>Subject<span class="required-star"> *</span></label>
        <select class="form-control" name="subject_id">
            <option value="">Select Subject</option>
            @foreach($subjects as $subject)
                <option @if( isset($video) and $video->subject_id == $subject->id) selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        @error('subject_id') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-lg-7">
    <div class="form-group">
        <label>Name<span class="required-star"> *</span></label>
        <input type="text" value="{{ isset($video->name) ? $video->name : old('name')}}" name="name" class="form-control">
        @error('name') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-7">
            <div class="form-group">
                <label>
                    Embed Code<span class="required-star"> *</span>
                    <button class="btn btn-xs btn-primary" type="button" onclick="preview()">Preview</button>
                </label>
                <textarea name="embed_code" id="textarea2" class="form-control" rows="6">{!! isset($video->embed_code) ? $video->embed_code : old('embed_code') !!}</textarea>
                @error('embed_code') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-3">
            <iframe id="preview" style="margin-top: 32px;width: 100%!important;" height="130" class="hidden" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>


<div class="col-lg-7">
    <div class="form-group">
        <label>Thumbnail<span class="required-star"> *</span></label>
        <input type="file" name="img" class="form-control">
        @error('img') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
        @if(!empty($video->thumbnail))
            <img src="{{ asset('admin/uploads/images/video/'.$video->thumbnail) }}" style="margin-top:10px" width="100" height="100">
        @endif
    </div>
</div>

@section('custom-js')
    <script>
        function preview() {

            $('#preview').attr('src', '');

            if(!$('#textarea2').val().trim()){
                alert('Embed Code not found');
                return
            }

            let src = $('#textarea2').val().split('src="')[1].split('"')[0];
            $('#preview').attr('src', src).removeClass('hidden');
        }
    </script>
@endsection



