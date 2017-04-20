@extends('layouts.blog-post');



@section('content');

<div class="col-lg-8">

    @if(Session::has('reply_message'))
        <h4 class="bg-success">{{Session('reply_message')}}</h4>
    @endif
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/postplaceholder.jpg'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>


    <!-- Blog Comments -->
    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        @if(Session::has('comment_message'))
            <h6 class="bg-info">{{Session('comment_message')}}</h6>
        @endif
        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                {!! Form::label('body','Comment:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
        <hr>

    @endif

    <!-- Posted Comments -->
    @if(count($comment)>0)
        @foreach($comment As $comment)
            <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64px" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            {{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>


                    <!-- Nested Comment -->

                        @if(count($comment->replies) > 0)
                        @foreach($comment->replies As $reply)
                        <div class="media nested_comment">
                            <a class="pull-left" href="#">
                                <img height="64px" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>
                        </div>
                        @endforeach
                            <div class="toggle-reply btn">Click to reply</div>
                        @endif
                        <div class="comment-reply">
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                            <div class="form-group">
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Reply',['class'=>'btn btn-primary pull-right']) !!}
                            </div>
                        {!! Form::close() !!}
                        <!-- End Nested Comment -->
                        </div>
                    </div>
                </div>


        @endforeach

    @endif
</div>

@endsection

@section('script')
    <script>
        $(".toggle-reply").click(function(){
            $(".comment-reply").slideToggle('slow');
        });


    </script>


@endsection