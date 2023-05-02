<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Stations | SRA</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.constra-css-plugins')

</head>
<body>
<div class="body-inner">

    @include('layouts.constra-topnav')

    <div id="banner-area" class="banner-area" style="background-image:url({{asset('constra/images/slider-main/bg2_new.jpg')}})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Stations</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                                                        <li class="breadcrumb-item active" aria-current="page">sra</li>
                                                                        <li class="breadcrumb-item active" aria-current="page">Stations</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container mt-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">BACOLOD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">LAGRANJA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">PAMPANGA</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>BACOLOD STATION</h3>
                    <style>
                        table1 {
                            border-top: 5px solid green;

                        }

                    </style>
{{--SubTabStart--}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home1">ANNOUNCEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu11">EVENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu21">EXTENSION SERVICES</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home1" class="container tab-pane active"><br>
                            <h3>ANNOUNCEMENT</h3>
                            <style>
                                table1 {
                                    border-top: 5px solid green;

                                }

                            </style>
                            @include('landingPage.stations.Bacolod.Announcement')
                        </div>
                        <div id="menu11" class="container tab-pane fade"><br>
                            <h3>EVENT</h3>
                            @include('landingPage.stations.Bacolod.Event')
                        </div>
                        <div id="menu21" class="container tab-pane fade"><br>
                            <h3>EXTENSION SERVICES</h3>
                            @include('landingPage.stations.Bacolod.ExtensionService')
                        </div>
                    </div>
                </div>
{{--SubTubEnd--}}



                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>LAGRANJA STATION</h3>
                    {{--SubTabStart--}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home11">ANNOUNCEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu111">EVENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu211">EXTENSION SERVICES</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home11" class="container tab-pane active"><br>
                            <h3>ANNOUNCEMENT</h3>
                            <style>
                                table1 {
                                    border-top: 5px solid green;

                                }

                            </style>
                            @include('landingPage.stations.LagRanja.Announcement')
                        </div>
                        <div id="menu111" class="container tab-pane fade"><br>
                            <h3>EVENT</h3>
                            @include('landingPage.stations.LagRanja.Event')
                        </div>
                        <div id="menu211" class="container tab-pane fade"><br>
                            <h3>EXTENSION SERVICES</h3>
                            @include('landingPage.stations.LagRanja.ExtensionService')
                        </div>
                    </div>
                </div>
                {{--SubTubEnd--}}


                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>PAMPANGA STATION</h3>
                    {{--SubTabStart--}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home111">ANNOUNCEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1111">EVENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2111">EXTENSION SERVICES</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home111" class="container tab-pane active"><br>
                            <h3>ANNOUNCEMENT</h3>
                            <style>
                                table1 {
                                    border-top: 5px solid green;

                                }

                            </style>
                            @include('landingPage.stations.Pampanga.Announcement')
                        </div>
                        <div id="menu1111" class="container tab-pane fade"><br>
                            <h3>EVENT</h3>
                            @include('landingPage.stations.Pampanga.Event')
                        </div>
                        <div id="menu2111" class="container tab-pane fade"><br>
                            <h3>EXTENSION SERVICES</h3>
                            @include('landingPage.stations.Pampanga.ExtensionService')
                        </div>
                    </div>
                </div>
            {{--SubTubEnd--}}

            </div>
        </div>


    </section><!-- Main container end -->

    @include('layouts.constra-footer')

    @include('layouts.constra-js-plugins')
    @yield('scripts')

    {{--    <script type="text/javascript">--}}
    {{--        function viewNav(routE){--}}
    {{--            window.open("{{route('navRoute')}}".replace('navRoute', routE),'_blank').focus();--}}
    {{--        }--}}
    {{--    </script>--}}

</div><!-- Body inner end -->
</body>

</html>
