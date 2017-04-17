@extends('layouts.admin')

@section('content')
    <h1>Create post</h1>
    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Post Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Options'] + $category,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Content:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.display_errors')

@endsection


@section('footer')

@endsection

