<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Mandate | SRA</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts.constra-css-plugins')

</head>
<body>
 <style>
   p {
     text-justify: auto;
   }
 </style>
<div class="body-inner">

  @include('layouts.constra-topnav')

  <div id="banner-area" class="banner-area" style="background-image:url({{asset('constra/images/slider-main/bg2_new.jpg')}})">
    <div class="banner-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="banner-heading">
              <h1 class="banner-title">Mandate</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  <li class="breadcrumb-item active" aria-current="page">Mandate</li>
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
        <div class="col-lg-8 mt-4 mt-lg-0">
          <!--<h3 class="into-sub-title">Our Values</h3>
          <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>-->

          <div class="accordion accordion-group" id="our-values-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Mandate
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                <div class="card-body text-justify">
                  <p>The legal mandate of SRA is embodied in Executive Order No. 18  dated  May 28, 1986 creating the Sugar Regulatory Administration.  It states that the policy of the State is to promote the growth & development of the sugar industry through greater participation of the private sector and to improve the working conditions of the laborers.</p>
                  <p>RA 10659 or the Sugarcane Industry Development Act of 2015 further declares the policy of the State to promote the competitiveness of the sugarcane industry and maximize the utilization of sugarcane resources, and improve the incomes of farmers and farm workers, through improved productivity, product diversification, job generation, and increased efficiency of sugar mills.</p>
                  <p>RA 9367 or the Biofuels Act of 2006 mandated SRA as member of the National Biofuel Board (NBB) to develop and implement policies supporting the Philippine Biofuel Program and ensure bioethanol feedstock supply and security of domestic sugar supply.</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Vision
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                <div class="card-body text-justify">
                  <blockquote><p>By 2040, the Philippines shall have a globally competitive sugarcane industry that supports the food, power, and other related industries through an institutionally competent SRA and committed stakeholders, for a secured future for Filipinos.</p></blockquote>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Mission
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                <div class="card-body text-justify">
                  <blockquote><p>SRA is a Government Owned and Controlled Corporation which formulates responsive development and regulatory policies, and provides RD & E services to ensure sufficient supply of sugarcane for a diversified, sustainable and competitive industry that improves productivity and profitability of sugarcane farmers and processing industries, and provides decent income for workers towards enhancing the quality of life of Filipinos.</p></blockquote>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    CORE VALUES
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#our-values-accordion">
                <div class="card-body ">
                  <ul>
                    <li>Patriotism</li>
                    <li>Integrity</li>
                    <li>Excellence</li>
                    <li>Spirituality</li>
                    <li>Professionalism</li>
                    <li>Accountability</li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    QUALITY POLICY
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#our-values-accordion">
                <div class="card-body text-justify">
                  <blockquote><p>SRA is committed to promote the advancement and competitiveness of the sugarcane industry amidst global challenges. It shall continue to improve the way it does its business, in an effort to meet the expectations of its clientele while maintaining compliance, to applicable legal requirements. It shall ensure the continual improvement of its human resource capabilities, as response to the current and strategic needs of the industry.</p></blockquote>
                </div>
              </div>
            </div>
          </div>
          <!--/ Accordion end -->

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
