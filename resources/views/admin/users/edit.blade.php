@extends('layouts.admin')

@section('content')

    <h1>Edit Users</h1>

    <div class="col-md-3">

        <img src = "{{$user->photo ? URL::to('/').$user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    
    </div>

    <div class="col-md-9">
        @include('includes.form_error')

        {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id',$roles, null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Upload Image') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-primary col-md-6']) !!}
            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger btn-delete col-md-6']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-delete").click(function(){

                var r = confirm("Are you sure you want to delete this?");
                if(r){
                    return true;
                } else {
                    return false;
                }

            });
        });

    </script>

@endsection