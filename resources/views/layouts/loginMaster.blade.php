<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Panel</title>

        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('font-awesome/css/font-awesome.css') !!}
        {!! Html::style('css/animate.css') !!}
        {!! Html::style('css/style.css') !!}

    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div style="margin-top: 150px;"></div>
                <h3>Welcome to CV Bank</h3>
                @yield('content')
            </div>
        </div>
        {!! Html::script('js/jquery-2.1.1.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
    </body>
</html>