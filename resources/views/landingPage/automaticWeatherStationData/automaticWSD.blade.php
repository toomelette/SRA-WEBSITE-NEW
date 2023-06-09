<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Automatic Weather Station Data | SRA</title>

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
                            <h1 class="banner-title">Automatic Weather Station Data</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
{{--                                    <li class="breadcrumb-item active" aria-current="page">Automatic Weather Station Data</li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">Automatic Weather Station Data</li>--}}
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container mb-lg-5 mt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
{{--                    <ul>--}}
{{--                        <li>GAD Laws and Policies <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/Laws-and-Policies-on-GAD.pdf" target="_blank"> Read more… </a></li>--}}

{{--                    </ul>--}}
{{--                    <iframe src="{{asset('constra/files/PagasaClimateOutlook/climateoutlook.pdf')}}"></iframe>--}}
                    <h3>AUTOMATIC WEATHER STATION DATA</h3><h5>Via PAGASA WEB PAGE</h5>
                    <embed style="border: 10px solid green" src="https://bagong.pagasa.dost.gov.ph/index.php" width="100%" height="1000px"/>



                </div>
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
