
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Historical Statistics | SRA</title>

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
              <h1 class="banner-title">Historical Statistics</h1>
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
          <p class="text-justify">This Sugar Statistics covers information on the sugar industry including areas, annual production and withdrawals, other agricultural parameters, size of agricultural farms, mill processing data and sugar exports to the US. which are significant interest to the end-users. Information generation was achieved through the generous efforts of the duly concerned officers of Sugar Regulation Administration (SRA).</p>
          </p>
          <p class="text-justify">
            It is therefore laudable to acknowledge the collective contribution of several units of SRA who provided relevant statistical information. Among these offices are Regulation Department, Research Development and Extension Office and Planning and Policy Department.
          </p>
          <hr>
        </div>
        <div class="col-lg-12 mt-4 mt-lg-0">
          <!--<h3 class="into-sub-title">Our Values</h3>
          <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>-->

          <div class="accordion accordion-group" id="our-values-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Production & Trade Data for the last 5 years (2017-2022)
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u> - 1st Qtr</li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u> - 1st Qtr</li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u> - 1st Qtr</li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u> - 1st Qtr</li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u> - as of May 15, 2022</li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u> - 1st Qtr</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Production & Trade Data for the last 5 years (2016-2021)
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Production & Trade Data for the last 5 years (2015-2020)
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Production & Trade Data for the last 5 years (2014-2019)
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Production & Trade Data for the last 5 years (2013-2018)
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare 2013-2018 (1878)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month 2013-2018 (846)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month 2013-2018 (579)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month 2013-2018 (494)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses 2013-2018 (1217)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila 2013-2018 (977)</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingSix">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Production & Trade Data for the last 5 years (2012-2017)
                  </button>
                </h2>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare 2012-2017 (734)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month 2012-2017 (438)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month 2012-2017 (363)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month 2012-2017 (342)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses 2012-2017 (582)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila 2012-2017 (489)</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingSeven">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Production & Trade Data for the last 5 years (2011-2016)
                  </button>
                </h2>
              </div>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare 2011-2016 (3032)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month 2011-2016 (1713)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month 2011-2016 (1352)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month 2011-2016 (1098)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses 2011-2016 (2288)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila 2011-2016 (1753)</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingEight">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Production & Trade Data for the last 5 years (2010-2015)
                  </button>
                </h2>
              </div>
              <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare 2010-2015 (2574)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month 2010-2015 (1289)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month 2010-2015 (974)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month 2010-2015 (997)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses 2010-2015 (1599)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila 2010-2015 (1330)</a></u></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingNine">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Production & Trade Data for the last 5 years (2009-2014)
                  </button>
                </h2>
              </div>
              <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#our-values-accordion">
                <div class="card-body">
                  <h5>Downloadable Files</h5>
                  <ol>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare 2009-2014 (909)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month 2009-2014 (697)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month 2009-2014 (708)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month 2009-2014 (687)</a></u></li>
                    <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses 2009-2014 (4009)</a></u></li>
                  </ol>
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
