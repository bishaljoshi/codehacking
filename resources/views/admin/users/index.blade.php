@extends('layouts.admin') 

@section('content')

    @if(Session::has('deleted_user'))

        <p class="alert alert-danger">{{session('deleted_user')}}</p>

    @endif

    @if(Session::has('created_user'))

        <p class="alert alert-success">{{session('created_user')}}</p>

    @endif

    @if(Session::has('updated_user'))

        <p class="alert alert-success">{{session('updated_user')}}</p>

    @endif
    
    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($users->count())
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height = "50" src = "{{$user->photo ? URL::to('/').$user->photo->file : 'http://placehold.it/400x400'}}" alt="No photo"></td>
                        <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id == 0 ? "" : $user->role->name}}</td>
                        <td>{{$user->is_active ? 'Active' : 'Inactive'}}
                        <td>{{$user->created_at->diffForHumans()}}
                        <td>{{$user->updated_at->diffForHumans()}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No User found.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection