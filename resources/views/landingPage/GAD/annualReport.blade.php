<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>GAD Annual Report | SRA</title>

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
              <h1 class="banner-title">GAD Annual Report</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Gender and Development</li>
                  <li class="breadcrumb-item active" aria-current="page">Annual Report</li>
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

{{--          <ul>--}}
{{--            <li>Annual Report 2021 <a style="color: #ffb600" href="file:///C:\home\GAD\GAD-Annual-Report-2021.pdf" target="_blank"> Read more… </a></li>--}}
{{--          </ul>--}}
{{--        </div>--}}

          <h2>Gender and Development (GAD)</h2><br><br>
          <p>
          @php
            $AnnualReport = \App\Models\GAD_annualReport::query()->get()->sortBy('id');
          @endphp
          @if(count($AnnualReport) > 0)
            <ul>
              <div class="row">
                @foreach ($AnnualReport as $annualReport)
                  <div class="col-4">
                    <li>
                    <a style="color: #ffb600" href="/home/sra_website/{!!$annualReport->path!!}" target="_blank"><img loading="lazy" class="testimonial-thumb" src="{{asset('constra/images/SRA/pdfDefault.gif')}}" alt="PDF LOGO"> {!!$annualReport->year!!}</a><br>{!!$annualReport->title!!}</li><br><br>
                  </div>
                @endforeach
              </div>
            </ul>
            @endif
            </p>


            <p>

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
