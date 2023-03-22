<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Overview | SRA</title>

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
              <h1 class="banner-title">Overview</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  <li class="breadcrumb-item active" aria-current="page">Overview</li>
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
      <div class="row">
        <div class="col-lg-6">
          <h3 class="column-title">I. PLANTATION AREAS AND FARM PRODUCTIVITY</h3>
          <p></p>
          <p class="text-justify">The total sugarcane plantation area for crop year (CY) 2018-2019 was 409,714 hectares (has.). As shown in Figure 1, the plantation area decreased by over 8000 hectares compared to CY 2017-2018. The said decrease in the plantation areas may be accounted for by the conversion of sugarcane plantations to plantations for other crops. Approximately 67% of the total sugarcane area in the country is situated in the Visayas Region, 19% in Mindanao and the remaining 14% in Luzon. &nbsp;&nbsp;&nbsp;<a class="learn-more d-inline-block" href="#" aria-label="read-more"><i class="fa fa-caret-right"></i> Read more</a></p>

        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">

          <div id="page-slider" class="page-slider small-bg">

            <div class="item" style="background-image:url({{asset('constra/images/SRA/About-Us-SRA-Bldg.jpg')}}">
              <div class="container">
                <div class="box-slider-content">
                  <div class="box-slider-text">
                    <h2 class="box-slide-title"></h2>
                  </div>
                </div>
              </div>
            </div><!-- Item 1 end -->
          </div><!-- Page slider end-->


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
