@extends('layouts.admin')
@section('content')
<h1>cung</h1>
    <h1>Edit Users</h1>
    {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id', $roles, null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active', [1=>'Active',0=>'Not Active',''=>'Choose Options'],null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.display_errors')

@endsection