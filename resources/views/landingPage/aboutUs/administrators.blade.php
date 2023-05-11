<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Administrators | SRA</title>

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
              <h1 class="banner-title">Administrators</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  <li class="breadcrumb-item active" aria-current="page">Administrators</li>
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
      <div class="row text-center">

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Arsenio-B-Yulo-Jun-2-1986-Fe-6-1992.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Arsenio-B-Yulo-Jun-2-1986-Fe-6-1992.jpg")}}" class="img-fluid" title="Arsenio B Yulo Jun 2, 1986 - Fe 6, 1992" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Arsenio B Yulo</h3>
              <p class="ts-designation">June 2, 1986 – February 6, 1992</p>
            {{--              <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>--}}
            {{--              <div class="team-social-icons">--}}
            {{--                <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>--}}
            {{--                <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>--}}
            {{--                <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>--}}
            {{--                <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>--}}
            {{--              </div>--}}
            <!--/ social-icons-->
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Rodolfo-A.-Gamboa-Feb-7-1992-Jan-26-1996.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Rodolfo-A.-Gamboa-Feb-7-1992-Jan-26-1996.jpg")}}" class="img-fluid" title="Rodolfo A. Gamboa Feb 7, 1992 - Jan 26, 1996" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Rodolfo A. Gamboa</h3>
              <p class="ts-designation">February 7, 1992 – January 26, 1996</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Rolleo-L.-Ignacio-Jan-29-1996-Aug-11-1996.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Rolleo-L.-Ignacio-Jan-29-1996-Aug-11-1996.jpg")}}" class="img-fluid" title="Rolleo L. Ignacio Jan 29, 1996 - Aug 11, 1996" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Rolleo L. Ignacio</h3>
              <p class="ts-designation">January 29, 1996 – August 11, 1996</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Wilson-P.-Gamboa-Aug-12-1996-Nov-30-1997.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Wilson-P.-Gamboa-Aug-12-1996-Nov-30-1997.jpg")}}" class="img-fluid" title="Wilson P. Gamboa Aug 12, 1996 - Nov 30, 1997" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Wilson P. Gamboa</h3>
              <p class="ts-designation">Aug. 12, 1996 – Nov. 30, 1997</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Michael-K.-Suarez-Dec-30-1997-Jun-30-19981.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Michael-K.-Suarez-Dec-30-1997-Jun-30-19981.jpg")}}" class="img-fluid" title="Michael K. Suarez Dec 30, 1997 - Jun 30, 1998"  alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Michael K. Suarez</h3>
              <p class="ts-designation">December 30, 1997 – June 30, 1998</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Nicolas-A.-Alonso-Jul-6-1998-Mar-4-20011.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Nicolas-A.-Alonso-Jul-6-1998-Mar-4-20011.jpg")}}" class="img-fluid" title="Nicolas A. Alonso Jul 6, 1998 - Mar 4, 2001" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Nicolas A. Alonso</h3>
              <p class="ts-designation">July 6, 1998 – March 4, 2001</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/James-C.-Ledesma-Mar-5-2001-Aug-31-2007.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/James-C.-Ledesma-Mar-5-2001-Aug-31-2007.jpg")}}" class="img-fluid" title="James C. Ledesma Mar 5, 2001 - Aug 31, 2007" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">James C. Ledesma</h3>
              <p class="ts-designation">March 5, 2001 – August 31, 2007</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Rafael-L.-Coscolluela-Sep-1-2007-Mar-2-2010.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Rafael-L.-Coscolluela-Sep-1-2007-Mar-2-2010.jpg")}}" class="img-fluid" title="Rafael L. Coscolluela Sep 1, 2007 -  Mar 2, 2010" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Rafael L. Coscolluela</h3>
              <p class="ts-designation">Sept. 1, 2007 – &nbsp;March 2, 2010</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Bernardo-C.-Trebol-Mar-5-2010-Jul-31-2010.jpg")}}"><img loading="lazy" src="{{asset("constra/images/administrators/Bernardo-C.-Trebol-Mar-5-2010-Jul-31-2010.jpg")}}" class="img-fluid" title="Bernardo C. Trebol Mar 5, 2010 - Jul 31, 2010" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Bernardo C. Trebol</h3>
              <p class="ts-designation">March 5, 2010 – July 31, 2010</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Ma.-Regina-Bautista-Martin-Aug-17-2010-present.jpg")}}"><img loading=lazy" src="{{asset("constra/images/administrators/Ma.-Regina-Bautista-Martin-Aug-17-2010-present.jpg")}}" class="img-fluid" title="Ma. Regina Bautista-Martin August 17, 2010 – Nov 20, 2016" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Ma. Regina Bautista-Martin</h3>
              <p class="ts-designation">August 17, 2010 – Nov 20, 2016</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/Paner-ID-Pic.jpg")}}"> <img width="50%" loading="lazy" src="{{asset("constra/images/administrators/Paner-ID-Pic.jpg")}}" class="img-fluid" title="Anna Rosario V. Paner November 21, 2016 – Sept. 20, 2017" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Anna Rosario V. Paner</h3>
              <p class="ts-designation">November 21, 2016 – Sept. 20, 2017</p>"
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/serafica-crop2.jpg")}}"><img width="50%" loading="lazy" src="{{asset("constra/images/administrators/serafica-crop2.jpg")}}" class="img-fluid" title="" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">Hermenegildo R. Serafica</h3>
              <p class="ts-designation">September 25, 2017 – June 30, 2022</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/DAVID JOHN THADDEUS P. ALBA-August 19, 2022 – April 15, 2023.png")}}"><img width="50%" loading="lazy" src="{{asset("constra/images/administrators/DAVID JOHN THADDEUS P. ALBA-August 19, 2022 – April 15, 2023.png")}}" class="img-fluid" title="David John Thaddeus P. Alba July 1, 2022" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">David John Thaddeus P. Alba</h3>
              <p class="ts-designation">September 2, 2022 - April 15, 2023</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <a href="{{asset("constra/images/administrators/PABLO LUIS S. AZCONA.png")}}"><img width="50%" loading="lazy" src="{{asset("constra/images/administrators/PABLO LUIS S. AZCONA.png")}}" class="img-fluid" title="PABLO LUIS S. AZCONA" alt="team-img"></a>
            </div>
            <div class="ts-team-content-classic">
              <h3 class="ts-name">PABLO LUIS S. AZCONA</h3>
              <p class="ts-designation">April 20, 2023 – to present</p>
            </div>
          </div>
          <!--/ Team wrapper 3 end -->
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
