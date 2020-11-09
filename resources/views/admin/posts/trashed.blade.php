@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="navbar navbar-expand-lg">
            <ul class="navbar-nav ml-auto mr-4">
                <li class="nav-item active">
                    <a class="href="#">{{ $subtitle }} <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav mr-sm-0">
                <li class="nav-item mr-sm-2">
                    <a class="btn btn-success" href="{{ route("admin.posts.create") }}">
                        Add New
                    </a>
                </li>
                <li class="nav-item mr-sm-2">
                    <a class="btn btn-info" href="{{ route("admin.posts.index") }}">
                      <i class="fas fa-home"></i> All Post
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-post">
                <thead>
                    <tr>
                        <th width="10">
                            <input type="checkbox" id="checkAll">
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
                @forelse($posts as $key => $post)
                    <tr data-entry-id="{{ $post->id }}">
                        <td>
                            <input name='ids[]' type="checkbox" id="checkItem" value="{{ $post->id ?? '' }}">
                        </td>
                        <td>
                           {{ $post->id ?? '' }}
                        </td>
                        <td>
                           {{ $post->title ?? '' }}
                        </td>
                        <td>
                          <form action="{{ route('admin.posts.restore',  $post->id) }}" method="post" style="display: inline">
                            @csrf
                            <button title="Restore post" type="submit" class="btn btn-xs btn-primary"><i class="fas fa-restore"></i> Restore</button>
                          </form>    
                    
                          <form action="{{ route('admin.posts.force',  $post->id) }}" method="post" style="display: inline">
                            @method('DELETE') 
                            @csrf
                            <button title="Force Delete Post" type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Delete</button>
                          </form>  
                        </td>
                        </tr>
                @empty
                    <p>No trashed posts yet...</p>
                @endforelse
        
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection



