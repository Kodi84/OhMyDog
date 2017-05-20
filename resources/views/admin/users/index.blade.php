@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_user'))
        <h4 class="bg-danger">{{Session('deleted_user')}}</h4>
    @endif

    @if(Session::has('created_user'))
        <h4 class="bg-success">{{Session('created_user')}}</h4>
    @endif

    @if(Session::has('updated_user'))
        <h4 class="bg-info">{{Session('updated_user')}}</h4>
    @endif

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
        @if($user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><img height="60px" width="60px" src="{{$user->photo ? $user->photo->file :'/images/person-placeholder.jpg'}}" alt=""></td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">Edit</a></td>
                </tr>
        @endif
        </tbody>
    </table>
@endsection


@section('footer')

@endsection

