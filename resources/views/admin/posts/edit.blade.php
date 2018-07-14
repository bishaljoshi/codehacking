@extends('layouts.admin')

@section('content')

    <h1>Edit Posts</h1>

    <div class="col-md-3">
    
        <img height="50" src="{{$posts->photo ? URL::to('/') .$posts->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
    
    </div>
    <div class="col-md-9">
        
        @include('includes.form_error')
    
        {!! Form::model($posts,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$posts->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', [''=>'Select'] + $categories ,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post',['class'=>'btn btn-primary col-md-6']) !!}
            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$posts->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Post',['class'=>'btn btn-danger btn-delete col-md-6']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    <script type = "text/javascript">
        $(document).ready(function(){

            $(".btn-delete").click(function(){

                var r = confirm("Are you sure you want to delete this?");
                if(r){
                    return true;
                }else{
                    return false;
                }

            });
        });
    </script>
@endsection