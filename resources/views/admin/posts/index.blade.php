@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>user</th>
            <th>category</th>
            <th>photo</th>
            <th>title</th>
            <th>body</th>
            <th>created</th>
            <th>updated</th>
            <th>Edit</th>
            <th>View Post</th>
            <th>View Comment</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts As $posts)
                @if($posts->user->name == Auth::user()->name)
                <tr>
                    <td>{{$posts->id}}</td>
                    <td>{{$posts->user->name}}</td>
                    <td>{{$posts->category ? $posts->category->name : "Uncategorized" }}</td>
                    <td><img height="50px" src="{{$posts->photo_id ? $posts->photo->file :'/images/postplaceholder.jpg'}}" alt=""></td>
                    <td>{{$posts->title}}</td>
                    <td>{{$posts->body}}</td>
                    <td>{{$posts->created_at->diffForHumans()}}</td>
                    <td>{{$posts->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.posts.edit',$posts->id)}}">Edit</a></td>
                    <td><a href="{{route('home.post',$posts->id)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show',$posts->id)}}">View Comment</a></td>
                </tr>
                @endif
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


@section('footer')

@endsection

