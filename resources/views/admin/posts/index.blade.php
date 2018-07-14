@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('post_updated'))

        <p class="alert alert-success">{{session('post_updated')}}</p>

    @endif

    @if(Session::has('post_created'))

        <p class="alert alert-success">{{session('post_created')}}</p>

    @endif

    @if(Session::has('post_deleted'))

        <p class="alert alert-success">{{session('post_deleted')}}</p>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($posts->count())
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50" src="{{$post->photo_id ? URL::to('/').$post->photo->file : 'http://placehold.it/400x400' }}"></td>
                        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{ $post->user_id == 0 ? "": $post->user->name }}</a></td>
                        <td>{{$post->category ? $post->category->name : "Uncategorised"}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No result found.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection