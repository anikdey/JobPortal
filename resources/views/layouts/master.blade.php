<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JobPortal - @yield('title')</title>
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('font-awesome/css/font-awesome.css') !!}
        {!! Html::style('css/plugins/toastr/toastr.min.css') !!}
        {!! Html::style('js/plugins/gritter/jquery.gritter.css') !!}
        {!! Html::style('css/animate.css') !!}
        {!! Html::style('css/style.css') !!}
        {!! Html::script('js/jquery-2.1.1.js') !!}
        <script type="text/javascript">
            function checkDelete() {
                var $chk = confirm('Are You Sure You Want To Delete This?');
                if ($chk) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            {{--@include('inc.sidebar')--}}
            {{--{{ \Illuminate\Support\Facades\View::make('inc.sidebar') }}--}}
            @yield('sidebar')
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    @yield('header')
                </div>
                <div class="wrapper wrapper-content">
                    @yield('content')
                </div>
                <div class="footer">
                    @yield('footer')
                </div>
            </div>
            <!-- Area For The Right Sidebar -->
            @yield('rightSidebar')
        </div>
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/plugins/metisMenu/jquery.metisMenu.js') !!}
        {!! Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.tooltip.min.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.spline.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.resize.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.pie.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.symbol.js') !!}
        {!! Html::script('js/plugins/flot/jquery.flot.time.js') !!}
        {!! Html::script('js/plugins/peity/jquery.peity.min.js') !!}
        {!! Html::script('js/demo/peity-demo.js') !!}
        {!! Html::script('js/inspinia.js') !!}
        {!! Html::script('js/plugins/pace/pace.min.js') !!}
        {!! Html::script('js/plugins/jquery-ui/jquery-ui.min.js') !!}
        {!! Html::script('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') !!}
        {!! Html::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
        {!! Html::script('js/plugins/easypiechart/jquery.easypiechart.js') !!}
        {!! Html::script('js/plugins/sparkline/jquery.sparkline.min.js') !!}
        {!! Html::script('js/plugins/gritter/jquery.gritter.min.js') !!}
        {!! Html::script('js/plugins/chartJs/Chart.min.js') !!}
        {!! Html::script('js/plugins/toastr/toastr.min.js') !!}
    </body>
</html>