<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Charter | SRA</title>

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
              <h1 class="banner-title">Charter</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  <li class="breadcrumb-item active" aria-current="page">Charter</li>
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
          <p class="text-justify">
            The Sugar  Regulatory Administration (SRA) was created by virtue of Executive Order No. 18 dated May 28, 1986.  E.O. No. 18 was promulgated during the Freedom Constitution or Proclamation No. 3 dated March 25, 1986 by President Corazon C. Aquino which recognized the sugar industry as a major component of the socio-economic and political structure of the country.  It also reiterates that in order to protect the national interest, free market forces should be allowed to prevail in the marketing of sugar although the production of the same should be regulated and supported with an innovative research and development program and a socio-economic program which will be primarily be the private sector’s responsibility.
          </p>
          <hr>
          <p>
            <i>Further Reading:</i>
          </p>
          <p>
          <h4 style="color: #ffb600"><a href=""><u>Executive Order No. 18</u></a></h4>
            <i>Creating the Sugar Regulatory Administration</i>
          </p>

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
