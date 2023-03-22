<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Sugar Monitoring System | SRA</title>

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
              <h1 class="banner-title">Sugar Monitoring System</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Downloads</li>
                  <li class="breadcrumb-item active" aria-current="page">Sugar Monitoring System</li>
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
          @php
            $sugar_monitoring_system = \App\Models\SugarMonitoringSystem::query()->get();
          @endphp
          @if(count($sugar_monitoring_system) > 0)
            <ul>
              <div class="row">
                @foreach ($sugar_monitoring_system as $sugarMonitoringSystem)
                  <div class="col-4">
                    <img loading="lazy" class="testimonial-thumb" src="{{asset('constra/images/SRA/pdfDefault.gif')}}" alt="PDF LOGO">
                    <li><a style="color: #ffb600" href="/home/sra_website/{!!$sugarMonitoringSystem->path!!}" target="_blank">{!!$sugarMonitoringSystem->file_title!!}</a><br>{!!$sugarMonitoringSystem->title!!}</li>
                  </div>
                @endforeach
              </div>
            </ul>
          @endif
          </p>
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
