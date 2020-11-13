@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Create picture
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pictures.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="uploader">
                <input id="file-upload" type="file" name="filename" accept="image/*" onchange="readURL(this);" multiple>
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="#" alt="Preview" class="hidden">
                    <div id="start">
                        <i class="fas fa-download" aria-hidden="true"></i>
                        <div>Select a file</div>
                        <div id="notimage" class="hidden">Please select an image</div>
                        <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                        <br>
                        <span class="text-danger">{{ $errors->first('filename') }}</span>
                    </div>
                </label>
              </div>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>

    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    function readURL(input, id) {
        id = id || '#file-image';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#file-image').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
@endsection