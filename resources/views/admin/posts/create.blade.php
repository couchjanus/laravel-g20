@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Create Post') }}
    </div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ __('Post Title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Title Field Required') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ __('Content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" value="{{ old('content') }}" required></textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Content Field Required') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category">{{ __('Category') }}</label>
                <select class="form-control select2" name="category_id" id="category" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
                <span class="help-block">{{ __('Category Field Required') }}</span>
            </div>
            <div class="form-group">
                <label for="tag">{{ __('Tags') }}</label>
                <select class="form-control select2"  multiple='multiple' id="tag" name="tags[]">
                    @foreach($tags as $key => $value)
                        <option value="{{ $key }}">{{$value}}</option>
                    @endforeach
                </select>
                <span class="help-block">{{ __('Fields Tags Rewuired') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ __('Save') }}
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
