@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <strong>{{ $subtitle }} </strong>
            <a class="btn btn-success float-right" href="{{ route("admin.tags.create") }}">
                Add New
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        tag List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Expensetag">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $key => $tag)
                        <tr data-entry-id="{{ $tag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tag->id ?? '' }}
                            </td>
                            <td>
                                {{ $tag->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.tags.show', $tag->id) }}">
                                        view
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.tags.edit', $tag->id) }}">
                                        edit
                                </a>
                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="delete">
                                    </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>

    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

</script>
@endsection