<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>The Secretary | SRA</title>

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
              <h1 class="banner-title">The Secretary</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Department Of Agriculture</li>
                  <li class="breadcrumb-item active" aria-current="page">The Secretary</li>
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
        <div class="col-lg-6 mt-5 mt-lg-0">

          <div id="page-slider" class="page-slider small-bg">

            <div class="item">
              <div class="container">
                <img width="60%" src="{{asset('constra/images/departmentOfAgriculture/BBM-PHOTO.jpg')}}">
              </div>
            </div><!-- Item 1 end -->
          </div><!-- Page slider end-->


        </div><!-- Col end -->

        <div class="col-lg-6 text-justify">
          <p>
            <strong>President Ferdinand “Bongbong” R. Marcos Jr. (BBM)</strong> has long championed agricultural development throughout his nearly four decades in public service—during his stint as Governor of Ilocos Norte, from 1983 to 1986 and from 1998 to 2007, and as lawmaker, first as the Representative of the Second District of Ilocos Norte from 1992 to 1995 and from 2007 to 2010, and second, as Senator from 2010 to 2016.
          </p>
          <p>
            Under his leadership as Governor, Ilocos Norte saw significant expansion in rice and corn production as well as in livestock. He was branded as “Rice czar” as the province became rice self-sufficient with an average of 296 percent sufficiency level.
          </p>
          <p>
            Also, for the whole period of his term, Ilocos Norte sustained more than 100 % self-sufficiency in corn and other major commodities. The province is the number 1 garlic producer and second largest producer of mango in the region.
          </p>
        </div><!-- Col end -->
        <div class="col-lg-12 text-justify mt-5">
          <p>
            Among the agriculture-related bills President BBM filed during his term as Senator were Senate Bill (SB) No. 14 or the proposed National Irrigation Program of 2013, SB 112 or the proposed National Seeds Production Act, SB 1863 or the proposed Anti-Rice Wastage Act, and SB 409 or the proposed Philippine Soybean Authority Act.
            During the 16th Congress, he was a member of the Committees on Agriculture and Food and Agrarian Reform, as well as the Agricultural and Fisheries modernization and Congressional Oversight Committee on Agrarian Reform.
          </p>
          <p>
            Now, as the country’s 17th President, President BBM made the unprecedented decision of designating himself as the concurrent head of the Department of Agriculture amidst the looming global food crisis. In his inaugural message on June 30, the President noted that the country’s agriculture sector “cries for urgent attention” after years of neglect and misdirection.
          </p>
          <p>
            His plan of action for the short-term is to increase the yield of the country’s main staple and provide support to those in need of government assistance. Over the long-term, he is pushing for multi-year planning focused on the restructuring of the food value chain from research to development to retail.
          </p>
          <p>
            Hence, he called upon the members of the DA family to work fast and efficiently to surmount the numerous challenges that threaten the country’s food supply and stymied the growth of the farm sector for decades.
          </p>
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
