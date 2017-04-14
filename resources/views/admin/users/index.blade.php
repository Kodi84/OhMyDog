@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users As $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><img height="60px" src="{{$user->photo ? $user->photo->file :''}}" alt="">{{!$user->photo?'no photo':"" }}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">Edit</a></td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


@section('footer')

@endsection

