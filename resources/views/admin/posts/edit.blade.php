@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Edit Post') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posts.update", [$post->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label class="required" for="title">{{ __('Post Title') }}</label>
                <input class="form-control class="@error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <span class="help-block">{{ __('Title Field Required') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ __('Content') }}</label>
                <textarea class="form-control" name="content" id="content" required>
                {{ $post->content }}</textarea>
                <span class="help-block">{{ __('Content Field Required') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="status" name="status" {{ ($post->status == 1)?'checked':'' }}>
                    <label class="form-check-label" for="status">
                        {{ __('Check If Published') }}
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="required" for="category">{{ __('Category') }}</label>
                <select class="form-control select2" name="category_id" id="category" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ ($post->category_id == $id) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                <span class="help-block">{{ __('Category Field Required') }}</span>
            </div>
             <div class="form-group">
                <label for="tag" class= 'control-label'>Select tags</label>
                <select name="tags[]" class="form-control select2" multiple='multiple' id='tag'>
                    @foreach($tags as $key => $value)
                        <option value="{{ $key }}"
                            {{ ($post->tags->pluck('id')->contains($key)) ? 'selected':'' }}  />
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mx-auto uploader">
                <input id="file-upload" type="file" name="cover" accept="image/*" onchange="readURL(this);">
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="{{ asset("storage/covers/blog/thumbnail/". $post->cover) }}" alt="Preview" class="">
                    <div id="start">
                        <i class="fas fa-download" aria-hidden="true"></i>
                        <div>Change This Image</div>
                        <div id="notimage" class="hidden">Please select an image</div>
                        <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                        <br>
                        <span class="text-danger">{{ $errors->first('cover') }}</span>
                    </div>
                </label>
              </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('js/select2.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

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
