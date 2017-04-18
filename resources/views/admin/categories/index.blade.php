@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <h1>Create</h1>
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <h1>Category</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories As $categories)
                    <tr>
                        <td>{{$categories->name}}</td>
                        <td>{{$categories->created_at ? $categories->created_at->diffForHumans() : 'No date' }}</td>
                        <td>{{$categories->updated_at ? $categories->updated_at->diffForHumans() : 'No date'}}</td>
                        <td><a href="{{route('admin.categories.edit',$categories->id)}}">Edit</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection


@section('footer')

@endsection

