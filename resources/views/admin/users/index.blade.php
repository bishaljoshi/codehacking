@extends('layouts.admin') 

    @section('content')

        <h1>Users</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
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
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
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