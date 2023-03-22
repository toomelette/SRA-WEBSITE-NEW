<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Top Stories | SRA</title>

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
              <h1 class="banner-title">Top Stories</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Department Of Agriculture</li>
                  <li class="breadcrumb-item active" aria-current="page">Top Stories</li>
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
      <div class="row text-center">
        <table width="100%">
          <tr>
            <td>
              <a href="https://www.da.gov.ph/news/" target="_blank"><img title="DA Stories" alt="DA Stories Icon" src="{{asset("constra/images/departmentOfAgriculture/DA-stories-icon-300x117.png")}}">
              </a>
              <p>
                ICON DIRECTLY CONNECTED TO DEPARTMENT OF AGRICULTURE WEBSITE
              </p>
            </td>
          </tr>
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
