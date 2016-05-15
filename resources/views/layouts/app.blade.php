<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    {!! Html::style('thirdparty/fonts/Lato/latofonts.css') !!}
    {!! Html::style('thirdparty/fonts/Lato/latostyle.css') !!}
    {!! Html::style('thirdparty/font-awesome/4.6.1/css/font-awesome.css') !!}
    {!! Html::style('thirdparty/bootstrap/3.3.6/css/bootstrap.css') !!}
    {!! Html::style('thirdparty/jquery-jsonview/1.2.3/dist/jquery.jsonview.css') !!}
    {!! Html::style('thirdparty/jquery-ui/1.11.4/jquery-ui.css') !!}
    {!! Html::style('thirdparty/jquery-ui/1.11.4/jquery-ui.theme.css') !!}
    {!! Html::style('thirdparty/jQuery-Timepicker-Addon/1.6.3/dist/jquery-ui-timepicker-addon.css') !!}

    <style>
        body {
            font-family: 'LatoWeb';
            padding-top: 70px;
        }

        h1, h2, h3, h4, h5, h6, b, strong{
            font-family: 'LatoWebBold';
        }
        i, em{
            font-family: 'LatoWebLight';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .btn-group {
            white-space: nowrap;
        }
        .btn-group > .btn {
            float: inherit;
        }
        .btn-group > .btn + .btn {
            margin-left: -4px;
        }

        .jsonview{
            font-size: 10px;
        }
    </style>

    @yield ('styles')
    
    {!! Html::script('thirdparty/js/jquery-1.12.3.js') !!}
    {!! Html::script('thirdparty/bootstrap/3.3.6/js/bootstrap.js') !!}
    {!! Html::script('thirdparty/jquery-jsonview/1.2.3/dist/jquery.jsonview.js') !!}
    {!! Html::script('thirdparty/jquery-ui/1.11.4/jquery-ui.js') !!}
    {!! Html::script('thirdparty/jQuery-Timepicker-Addon/1.6.3/dist/jquery-ui-timepicker-addon.js') !!}
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ root_url('/') }}">
                            app.dev
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ root_url('/login') }}">Login</a></li>
                        <li><a href="{{ root_url('/register') }}">Register</a></li>
                    @else
                        <?php
                            if (
                                Gate::check('manage-users')
                                || Gate::check('manage-roles')
                                || Gate::check('manage-permissions')
                            ) :
                        ?>
                            <li>
                                <a href="{{ root_url('/dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                        <?php
                            endif;
                        ?>
                        <li>
                            <a href="{{ url('backend') }}">
                                Backend
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ root_url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        $(function() {
            $(".jsonview").each(function (){
                $el = $(this);
                $el.JSONView($el.data('json'), {
                    collapsed: true
                });
            });
            $(".datepicker").datepicker();
            $(".datetimepicker").datetimepicker({
                timeFormat: "HH:mm:ss",
            });
        });
    </script>
</body>
</html>
