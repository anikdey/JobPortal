<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job Portal</title>
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/blog.css') !!}
    {!! Html::script('js/jquery-2.1.1.js') !!}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @yield('header')
    <div class="container">
      <div class="blog-header">
        <h4 class="blog-title">Job Portal</h4>
        <p class="lead blog-description">A Open Source Laravel 5.3 Project.</p>
      </div>
      <div class="row">
            @yield('content')
            @yield('sidebar')
      </div>
    </div>
    @yield('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {!! Html::script('js/bootstrap.min.js') !!}
  </body>
</html>
