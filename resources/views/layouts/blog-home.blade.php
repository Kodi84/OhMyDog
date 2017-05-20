<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
    @yield('navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        @yield('content')



        <!-- Blog Sidebar Widgets Column -->
        {{--<div class="col-md-4">--}}
            {{--<!-- Side Widget Well -->--}}
            {{--<div class="well text-center">--}}
                {{--<h4>CMS(Content Management System)</h4>--}}
                {{--<p>A software application used to upload, edit, and manage content displayed on a website. A content management system can perform a variety of different tasks for a website including regulating when content is displayed, how many times the content is shown to a specific user, and managing how the content connects or interacts with other elements of the website--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div class="well text-center">--}}
                {{--<h4>Please log in to experiment</h4>--}}
                {{--<p>--}}
                    {{--Please use the following to log in:--}}

                    {{--cungtran2015@gmail.com--}}
                    {{--<br>--}}
                    {{--Pass : 123456--}}
                {{--</p>--}}

                 {{--<h5>--}}
                     {{--Note that: There are different roles you can create,<strong>ADMIN</strong> not only can be able to login. But also, can comment and reply.--}}
                 {{--</h5>--}}
            {{--</div>--}}

        {{--</div>--}}

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
