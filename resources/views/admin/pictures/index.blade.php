@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <strong>{{ $subtitle }} </strong>
            <a class="btn btn-success float-right" href="{{ route("admin.pictures.create") }}">
                Add New
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Picture List
    </div>

    <div class="card-body">
        <div class="d-flex align-content-start flex-wrap">
            @forelse($pictures as $key => $picture)
            <div class="p-2 bd-highlight">
            {{-- {{ $picture->filename ?? '' }} --}}
            <img src="{{ $picture->filename ?? '' }}">
            </div>
            @empty 
                <h2>No Pictures Yet</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

</script>
@endsection