@extends('_layouts/layout')



@section('content')
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th class="w-50">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
