<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Government Website Links | SRA</title>

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
              <h1 class="banner-title">Government Website Links</h1>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row text-center">
        <table style="width: 100%;">
          <tbody style="border-style: dotted;">
          <tr>
            <td><a href="https://www.gov.ph/" target="_blank"><img title="Republic of the Philippines" alt="Republic of the Philippines" src="{{asset("constra/images/governmentWebsiteLinks/pilipinas.png")}}"></a></td>
            <td><a href="https://www.gov.ph/" target="_blank">Government Link</a></td>
          </tr>
          <tr>
            <td>&nbsp;<a href="https://www.dole.gov.ph"><img title="Department of Labor and Employment" alt="DOLE" src="{{asset("constra/images/governmentWebsiteLinks/DOLE.png")}}" width="66" height="72"></a></td>
            <td><a href="https://www.dole.gov.ph">Department of Labor and Employment</a></td>
          </tr>
          <tr>
            <td>&nbsp;<a href="https://www.doe.gov.ph"><img title="Department of Energy" alt="DOE" src="{{asset("constra/images/governmentWebsiteLinks/DOE.png")}}" width="66" height="72"></a></td>
            <td><a href="https://www.doe.gov.ph">Department of Energy</a></td>
          </tr>
          <tr>
            <td>&nbsp;<a href="https://dost.gov.ph/"><img title="Department of Science and Technology" alt="DOST" src="{{asset("constra/images/governmentWebsiteLinks/DOST.png")}}" width="66" height="72"></a></td>
            <td><a href="https://dost.gov.ph/">Department of Science and Technology</a></td>
          </tr>
          <tr>
            <td>&nbsp;<a href="https://dti.gov.ph"><img title="Department of Trade and Industry" alt="DTI" src="{{asset("constra/images/governmentWebsiteLinks/DTI.png")}}" width="66" height="72"></a></td>
            <td><a href="https://dti.gov.ph">Department of Trade and Industry</a></td>
          </tr>
          <tr>
            <td><a href="https://nsw.gov.ph"><img title="Philippine National Single Window" alt="PMSA" src="{{asset("constra/images/governmentWebsiteLinks/nws1.jpg")}}" width="66" height="72"></a></td>
            <td><a href="https://nsw.gov.ph">Philippine National Single Window</a></td>
          </tr>
          <tr>
            <td><a href="https://www.psma.com.ph"><img title="Philippine Sugar Millers Association" alt="PMSA" src="{{asset("constra/images/governmentWebsiteLinks/PMSA1.png")}}" width="66" height="72"></a></td>
            <td><a href="https://www.psma.com.ph">Philippine Sugar Millers Association</a></td>
          </tr>
          <tr>
            <td>&nbsp;<a href="https://www.usda.gov"><img title="United States Department of Agriculture" alt="USDA" src="{{asset("constra/images/governmentWebsiteLinks/usda1.png")}}" width="66" height="72"></a></td>
            <td><a href="https://www.usda.gov">United States Department of Agriculture</a></td>
          </tr>
          <tr>
            <td><a href="https://www.sugaronline.com/" target="_blank"><img title="Sugar On line" alt="Sugar On line" src="{{asset("constra/images/governmentWebsiteLinks/sugaronline2.png")}}" width="66" height="72"></a></td>
            <td><a href="https://www.sugaronline.com/" target="_blank">Sugar On line</a></td>
          </tr>
          </tbody>
        </table>
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
