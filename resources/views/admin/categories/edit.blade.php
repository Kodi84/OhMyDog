@extends('layouts.admin')

@section('content')
    <h1>Update</h1>
    <div class="col-sm-4">
        {!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {{--//DELETE--}}
        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection


@section('footer')

@endsection

