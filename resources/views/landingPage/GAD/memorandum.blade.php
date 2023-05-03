<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>GAD Memorandum | SRA</title>

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
              <h1 class="banner-title">GAD Memorandum</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Gender and Development</li>
                  <li class="breadcrumb-item active" aria-current="page">Memorandum</li>
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
        <div class="col-lg-12 text-justify">
          <p>Memorandum Order No. 2,&nbsp;Series of 2022, Observance of 18th Women with Disabilities Day and 2022 Girl Child Week <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/2022-MO-2.pdf" target="_blank">Read more… </a></p>
          <p>Memorandum Order No. 1,&nbsp;Series of 2022, Observance of 2022 National Women’s Month Celebration (NWMC) <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/2022-MO-1.pdf" target="_blank">Read more… </a></p>
          <p>Kick-off Activity for the National Women’s Month Celebration&nbsp;(Memorandum dated: March 4, 2022) <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/MEMO-Kick-off-Activity-for-the-NWMC.pdf" target="_blank"> Read more… </a></p>
          <p>Observance of 2021 18-day campaign to end Violence Against Women (VAW) (Memorandum dated: November 5, 2021) <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/MEMO-Observance-of-2021-18-Day-Campaign-to-End-VAW.pdf" target="_blank"> Read more… </a></p>
          <p>Reconstitution of the SRA Executive Committee and Gender and Development (GAD) Focal Point System (GFPS) <a style="color: #ffb600" href="https://www.sra.gov.ph/wp-content/uploads/2022/03/MEMO-SO-137-Reconstitution-of-the-SRA-Executive-Committee-and-GAD.pdf" target="_blank"> Read more… </a></p>
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
