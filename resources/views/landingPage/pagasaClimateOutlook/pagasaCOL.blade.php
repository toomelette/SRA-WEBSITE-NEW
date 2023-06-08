<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>PAGASA Climate Outlook | SRA</title>

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
                            <h1 class="banner-title">PAGASA Climate Outlook</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    {{--                                    <li class="breadcrumb-item active" aria-current="page">PAGASA Climate Outlook</li>--}}
                                    {{--                                    <li class="breadcrumb-item active" aria-current="page">PAGASA Climate Outlook</li>--}}
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
{{--                                        <ul>--}}
{{--                                            <li>GAD Laws and Policies <a style="color: #ffb600" href="constra/files/PagasaClimate Outlook/climateoutlook.pdf" target="_blank"> Read more… </a></li>--}}
{{--                                        </ul>--}}
                    <h3>CLIMATE OUTLOOK MARCH-AUGUST 2023</h3>
                    <iframe style="border: 10px solid green" src="https://pubfiles.pagasa.dost.gov.ph/climps/climateforum/outlook.pdf#toolbar=0" width="100%" height="600px"></iframe>
{{--                    <embed style="border: 10px solid green" src="https://pubfiles.pagasa.dost.gov.ph/climps/climateforum/outlook.pdf#toolbar=0" width="100%" height="600"/>--}}
{{--                    <a href="{{asset('constra/files/PagasaClimateOutlook/climateoutlook.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>--}}


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
