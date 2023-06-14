<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>SIDA Updates | SRA</title>

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
                            <h1 class="banner-title">SIDA Updates</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SIDA</li>
                                    <li class="breadcrumb-item active" aria-current="page">SIDA Updates</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="card">
                <div class="col-lg-12" style="margin-top: 15px">
                    <style>
                        html {
                            box-sizing: border-box;
                        }

                        *, *:before, *:after {
                            box-sizing: inherit;
                        }

                        .column {
                            float: left;
                            width: 33.3%;
                            margin-bottom: 16px;
                            padding: 0 8px;
                        }

                        @media screen and (max-width: 650px) {
                            .column {
                                width: 100%;
                                display: block;
                            }
                        }

                        .card {
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                        }

                        .container {
                            padding: 0 16px;
                        }

                        .container::after, .row::after {
                            content: "";
                            clear: both;
                            display: table;
                        }

                        .title {
                            color: grey;
                        }

                        .button {
                            border: none;
                            outline: 0;
                            display: inline-block;
                            padding: 8px;
                            color: white;
                            background-color: #000;
                            text-align: center;
                            cursor: pointer;
                            width: 100%;
                        }

                        .button:hover {
                            background-color: #555;
                        }
                    </style>


                    <div class="column">
                        <a href="/sida/blockFarm" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-blockfarm.jpg')}}" alt="" style="width: 100%; height: 230px; object-fit: cover ;">
                            <div class="container">
                                <h2>Block Farm Program</h2>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="column">
                        <a href="/sida/socializedCreditProg" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-socialized.jpg')}}" alt="" style="width: 100%; height: 230px; object-fit: cover ;">
                            <div class="container">
                                <h2>Socialized Credit Program</h2>
                            </div>
                        </div></a>
                    </div>

                    <div class="column">
                        <a href="/sida/farmMechanization" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-farm-mech.jpg')}}" alt="" style="width: 100%; height: 230px; object-fit: cover ;">
                            <div class="container">
                                <h2>Farm Mechanization</h2>
                            </div>
                        </div></a>
                    </div>

                    <div class="column">
                        <a href="/sida/infrastructureProg" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-Infra.jpg')}}" alt="" style="width: 100%; height: 230px; object-fit: cover ;">
                            <div class="container">
                                <h2>Infrastructure Program</h2>
                            </div>
                        </div></a>
                    </div>

                    <div class="column">
                        <a href="/sida/RDEProg" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-RDE.jpg')}}" alt="" style="width: 100%; height: 236px; object-fit: cover ;">
                            <div class="container">
                                <h3 style="font-size: 22px;">Research, Development & Extension Program</h3>
                            </div>
                        </div></a>
                    </div>

                    <div class="column">
                        <a href="/sida/scholarshipProg" target="_blank">
                        <div class="card">
                            <img src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-scholarship.jpg')}}" alt="" style="width: 100%; height: 230px; object-fit: cover ;">
                            <div class="container">
                                <h2>Scholarship Program</h2>
                            </div>
                        </div></a>
                    </div>


                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div><!-- Container end -->
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
