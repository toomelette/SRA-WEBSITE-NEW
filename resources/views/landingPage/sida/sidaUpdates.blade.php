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

                    <!-- Gallery -->
                    <div class="row">
                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <a href="/sida/blockFarm">
                            <img
                                    src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-blockfarm.jpg')}}"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="BLOCK FARM PROGRAM"
                                    height="250px;"
                            /></a>

                            <a href="/sida/socializedCreditProg">
                                <img
                                        src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-socialized.jpg')}}"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt="SOCIALIZED CREDIT PROGRAM"
                                        height="250px;"
                                /></a>
                        </div>

                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <a href="/sida/farmMechanization">
                                <img
                                        src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-farm-mech.jpg')}}"
                                        class="w-100  shadow-1-strong rounded mb-4"
                                        alt="FARM MECHANIZATION"
                                        height="250px;"
                                /></a>

                            <a href="/sida/infrastructureProg">
                                <img
                                        src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-Infra.jpg')}}"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt="INFRASTRUCTURE PROGRAM"
                                        height="250px;"
                                /></a>
                        </div>

                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <a href="/sida/RDEProg">
                                <img
                                        src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-RDE.jpg')}}"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt="RESEARCH DEVELOPMENT & EXTENSION PROGRAM "
                                        height="250px;"
                                /></a>

                            <a href="/sida/scholarshipProg">
                                <img
                                        src="{{asset('constra/images/SIDA/SidaUpdates/SIDA-scholarship.jpg')}}"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt="SCHOLARSHIP PROGRAM"
                                        height="250px;"
                                /></a>
                        </div>
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
