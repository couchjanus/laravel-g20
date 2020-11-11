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
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Title Field Required') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ __('Content') }}</label>
                <textarea class="form-control" name="content" id="content" required>
                {{ $post->content }}</textarea>
                <span class="help-block">{{ __('Content Field Required') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ __('Is Published?') }}</label>
                <input class="form-control" type="checkbox" name="status" id="status" {{ ($post->status == 1)?'checked':'' }}>
                <span class="help-block">{{ __('Status Post') }}</span>
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
</script>
@endsection
