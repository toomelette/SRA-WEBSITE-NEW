<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Online Application | SRA</title>

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
                            <h1 class="banner-title">Online Application</h1>
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
                <div class="col-lg-8">
                    <p class="text-justify">Guidelines Governing The Online Payment System for the Sugar Regulatory Service Fees Through The LandBank Link.BizPotal
                        <a href="{{asset('constra/files/LBP/2021-2022-CL-6.pdf')}}" target="_blank" style="color: green;"  >(Circular Letter No. 6)</a></p>
                    <p>Read Step by Step Procedures (Infographics) Below before accessing “Pay Online using Landbank LinkBiz.Portal”
                        <a href="https://www.lbp-eservices.com/egps/portal/index.jsp" target="_blank" style="color: green;">(Link to Portal)</a></p>
                    <img style="border: 5px solid green;" width="%" height="" src="{{asset('constra/images/LBP/Online-Payment-Infographics.jpg')}}">

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
