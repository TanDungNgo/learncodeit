@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Bài Viết</th>
            <th>Danh Mục</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $key => $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{  $post->name }}</td>
                <td>{{  $post->menu->name }}</td>
                <td>{!! \App\Helpers\Helper::active( $post->active) !!}</td>
                <td>{{  $post->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/posts/edit/{{ $post->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $post->id }}, '/admin/posts/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $posts->links() !!}
    </div>
@endsection


