<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Block Farm | SRA</title>

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
                            <h1 class="banner-title">Block Farm</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SIDA</li>
                                    <li class="breadcrumb-item active" aria-current="page">Industry Update</li>
                                    <li class="breadcrumb-item active" aria-current="page">Block Farm</li>
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
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">SIDA BLOCK FARM (LUZON AND MINDANAO)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">SIDA BLOCK FARM (VISAYAS)</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <style>
                        table1 {
                            border-top: 5px solid green;

                        }

                    </style>
                    @include('landingPage.sida.SidaBlockFarmLuzonandMindao.establishedBlockFarm-LuzonandMindanao')
                </div>
                {{--SubTubEnd--}}



                <div id="menu1" class="container tab-pane fade"><br>
                    {{--SubTabStart--}}
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home11">ESTABLISHED BLOCK FARM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu111">FARM MECHANIZATION SUPPORT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu211">ESTABLISHED HYV NURSERIES</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home11" class="container tab-pane active">
                            @include('landingPage.sida.SidaBlockFarmVisayas.establishedBlockFam-Visayas')
                        </div><br>
                        <div id="menu111" class="container tab-pane fade">
                            @include('landingPage.sida.SidaBlockFarmVisayas.farmmechanizationsupp-Visayas')
                        </div>
                        <div id="menu211" class="container tab-pane fade">
                            @include('landingPage.sida.SidaBlockFarmVisayas.establishedHYVNurseries-Visayas')
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

    <script type="text/javascript">
        function viewNav(routE){
            window.open("{{route('navRoute')}}".replace('navRoute', routE),'_blank').focus();
        }
    </script>

</div><!-- Body inner end -->
</body>

</html>
