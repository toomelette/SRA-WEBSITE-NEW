<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Services Offered | SRA</title>

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
              <h1 class="banner-title">Services Offered</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                  <li class="breadcrumb-item active" aria-current="page">Services Offered</li>
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
            <h4>RESEARCH DEVELOPMENT AND EXTENSION OFFICE (RDE)</h4>
            <ul>
              <li>Issuance of Certificate of Eligibility for Conversion of Sugarcance Land</li>
              <li>Soil Analysis</li>
              <li>Juice Analysis</li>
              <li>Sugar Analysis</li>
              <li>Micropropagated Plantlets</li>
              <li>Trichogramma Strips</li>
              <li>Information Dissemination</li>
              <li>Training and Workshop</li>
              <li>Microbiological Analyses</li>
              <li>Technical Survey and Evaluation</li>
              <li>Environmental Monitoring of Sugar Mills and Refiniries</li>
              <li>Survey/Identification/Validation of Expansion Areas for Ethanol Production</li>
              <li>Technology Transfer and Commercialization of SRA-generated Technologies</li>
              <li>Technical Audit / Evaluation of sugar factories and refineries</li>
              <li>Technical Inquiries</li>
              <li>Technical Data Dissemination</li>
              <li>Sale of Information Materials</li>
            </ul>
          </p>

          <p>
            <h4>REGULATION DEPARTMENT</h4>
            <ul>
              <li>Requirements for SRA Shipping Permit</li>
              <li>Sugar Trader</li>
              <li>Muscovado Converter/Trader</li>
              <li>Processors/Manufacturers of Sugar-Based Products for Export</li>

            </ul>
          </p>

          <p>
            <h4>CLEARANCES</h4>
            <ul class="">
              <li>Issuance of License to Mills/Refineries</li>
              <li>Issuance of Clearance for Release of Imported Sugar</li>
              <li>Issuance of Shipping Permit</li>
              <li>Issuance of Clearance to export Molasses/Muscovado</li>
              <li>Issuance of Sugar Export Clearance</li>
              <li>Issuance of Certificate of Exchange Authority (Cea) On Swapping of Two Different Classes of Sugar</li>
              <li>Issuance of License To Sugar/Molasses and Muscovado Traders</li>
              <li>Issuance of Certificate of Sugar Requirement of Processors of Sugar-Based Products</li>
              <li>Issuance of Premix Commodity Release Clearance</li>

            </ul>
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
