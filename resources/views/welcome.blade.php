@extends('layouts.blog-home')
@section('navigation')
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://laravelcmsfinal.dev/">CMS with Laravel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(!Auth::check())

                    <ul class="nav navbar-nav ">
                        <li>
                            <a href="http://laravelcmsfinal.dev/login">Login</a>
                        </li>
                    </ul>
                @endif
                @if(Auth::check())
                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="{{route('admin.users.index')}}"><i class="fa fa-user fa-fw"></i>Admin</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


@stop
@section('content')

<div class="col-md-8">
    @if($posts)
        <!-- First Blog Post -->
        @foreach($posts As $post)
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
            <hr>
            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/postplaceholder.jpg'}}" alt="">
            <hr>
            <p>{{$post->body}}</p>
            <a class="btn btn-primary" href="{{route('home.post',$post->id )}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach
    @endif
</div>
@endsection

{{--$post = Post::findOrFail($id);--}}
{{--$comment = $post->comments()->where('is_active',1)->get();--}}
{{--return view('post',compact('post','comment'));--}}