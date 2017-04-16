@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>user</th>
            <th>category</th>
            <th>photo</th>
            <th>title</th>
            <th>body</th>
            <th>created</th>
            <th>updated</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts As $posts)
                <tr>
                    <td>{{$posts->user_id}}</td>
                    <td>{{$posts->category_id}}</td>
                    <td>{{$posts->photo_id}}</td>
                    <td>{{$posts->title}}</td>
                    <td>{{$posts->body}}</td>
                    <td>{{$posts->created_at->diffForHumans()}}</td>
                    <td>{{$posts->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection


@section('footer')

@endsection

