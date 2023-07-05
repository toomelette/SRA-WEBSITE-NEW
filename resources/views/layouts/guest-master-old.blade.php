<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SRA | Sugar Regulatory Administration</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.css-plugins')

</head>
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header" style="margin-left: 400px;"  >
                    <a href="#" class="navbar-brand"><b>Sugar Regulatory Administration</b></a>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="notifications-menu"><a href="/">Back SRA Website</a></li>
                        <li class="notifications-menu"><a href="#">Info </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <div class="row text-center">
                    <a href="/">
                    <img width="25%" loading="lazy" class="bg-img" src="{{ url('constra/images/SRA/SRA_DA logo.png') }}" alt="img">
                    </a>
            @yield('content')
                </div>
            </div>
        </div>
    </div>


    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2022-2023 <a href="#">MIS-Visayas</a>.</strong> All rights
            reserved.
        </div>
    </footer>

</div>
@yield('modals')
@include('layouts.js-plugins')



@yield('scripts')



</body>
</html>