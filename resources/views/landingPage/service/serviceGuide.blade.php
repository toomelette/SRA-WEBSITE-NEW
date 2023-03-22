<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Service Guide | SRA</title>

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
              <h1 class="banner-title">Service Guide</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                  <li class="breadcrumb-item active" aria-current="page">Service Guide</li>
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
        <div class="col-lg-12">
          <p>
            <h4>External Services</h4>
            <ul>
              <li><a style="color: #EA7919"><u>Administrative and Finance Department (Quezon City)</u></a></li>
              <li><a style="color: #EA7919"><u>Research Development and Extension Department (Luzon and Mindanao)</u></a></li>
              <li><a style="color: #EA7919"><u>Regulation Department (Luzon and Mindanao)</u></a></li>
              <li><a style="color: #EA7919"><u>Planning, Policy and Special Project Department</u></a></li>
              <li><a style="color: #EA7919"><u>Administrative and Finance Department (Bacolod City)</u></a></li>
              <li><a style="color: #EA7919"><u>Research Development and Extension Department (Visayas)</u></a></li>
              <li><a style="color: #EA7919"><u>Regulation Department (Visayas)</u></a></li>
            </ul>
          </p>

          <p>
            <h4>Internal Services</h4>
            <ul>
              <li><a style="color: #EA7919"><u>Administrative and Finance Department (Quezon City)</u></a></li>
              <li><a style="color: #EA7919"><u>Planning, Policy and Special Project Department</u></a></li>
              <li><a style="color: #EA7919"><u>Administrative and Finance Department (Bacolod City)</u></a></li>
            </ul>
          </p>
          <hr>
          <h4><a href="" style="color: #EA7919">SIDA -  SRA Scholarship Process Flow</a></h4>
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
