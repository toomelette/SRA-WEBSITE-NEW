<section class="subscribe" style="background-color: green;">
  <nav class="navbar navbar-expand-lg navbar-dark p-0" style="margin-left: 10%;">

    <div id="navbar-collapse" class="collapse navbar-collapse" style="justify-content: center">
      <ul class="nav navbar-nav mr-auto">
        @php
          $footerNavigation = \App\Models\FooterNavigation::query()->where('is_main', '=', 1)->get();
        @endphp
        @if(count($footerNavigation) > 0)
          @foreach ($footerNavigation as $footerNav)
            <li class="nav-item dropdown">
              <a style="font-size: 10px;" href="{{ URL::to('/') }}/{!!$footerNav->route!!}" class="nav-link">{!!$footerNav->name!!}

{{--                <a class="btn" style="font-size: 10px;" onclick="viewNav('{!!$footerNav->route!!}')" class="nav-link dropdown-toggle" data-toggle="dropdown">{!!$footerNav->name!!} --}}
                  <i class="fa fa-angle-down"></i></a>
              @php
                $footer_sub_nav = \App\Models\FooterSubNav::query()->where('footer_nav_slug', '=', $footerNav->slug)->get();
              @endphp
              @if(count($footer_sub_nav) > 0)
                <ul class="dropdown-menu" role="menu">
                  @foreach ($footer_sub_nav as $FooterSubNav)
{{--                    <li><a class="btn" onclick="viewNav('{!!$FooterSubNav->route!!}')">{!!$FooterSubNav->name!!}</a></li>--}}
                    <li><a class="btn" href="{{ URL::to('/') }}/{!!$FooterSubNav->route!!}"> {!!$FooterSubNav->name!!}</a></li>

                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </nav>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<footer id="footer" class="footer bg-overlay">
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-widget footer-about">
          <h3 class="widget-title">About Us</h3>
          <img loading="lazy" width="100px" class="footer-logo" src="{{asset('constra/images/SRA/SRA_DA logo.png')}}" alt="SRA" style="background-color: white;">
          <p>Sugar Center | Sugar Regulatory Administration</p>
          <div class="footer-social">
            <ul>
              <li>
                <a title="Facebook" href="https://www.facebook.com/sugarregulatoryadmin" target="_blank" rel="noopener">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                </a>
              </li>
              <li>
                <a title="Twitter" href="https://twitter.com/Sugar_phils" target="_blank" rel="noopener">
                  <span class="social-icon"><i class="fab fa-twitter"></i></span>
                </a>
              </li>
              <li>
              <a title="Sugar Center Bldg., North Avenue, Diliman, Quezon City" href="https://goo.gl/maps/s1Nw9SvtgoqFrA818"><i class="fas fa-map-marker-alt"></i></a>
              </li>

            </ul>
          </div><!-- Footer social end -->
        </div><!-- Col end -->

        <div class="col-md-4 footer-widget mt-5 mt-md-0">
          <h3 class="widget-title">Working Hours</h3>
          <div class="working-hours">
            We work 5 days a week, excluding major holidays. Contact us if you have any concern, with our
            Hotline and Contact form.
            <br><br> Monday - Friday: <span class="text-right">08:00 AM - 05:00 PM </span>
          </div>
        </div><!-- Col end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->


</footer><!-- Footer end -->

<footer id="standard-footer" style="background-color: #efefef; margin-top: -3%">
  <style type="text/css" scoped="" style="display:none;">
    @import url(//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900);
    html,body{height:100%;width:100%;font-family:'Roboto',sans-serif;-webkit-font-smoothing:antialiased;}
    #standard-footer .row{ width: 100%; max-width: 1280px; }
    #standard-footer body, #standard-footer div, #standard-footer dl, #standard-footer dt, #standard-footer dd, #standard-footer ul, #standard-footer ol, #standard-footer li, #standard-footer h1, #standard-footer h2, #standard-footer h3, #standard-footer h4, #standard-footer h5, #standard-footer h6, #standard-footer pre, #standard-footer form, #standard-footer p, #standard-footer blockquote, #standard-footer th, #standard-footer td { font-size: 1rem; font-size: inherit; }
    #standard-footer{ color: #505050; padding: 1.25rem 0; font-size: .7rem;}
    #standard-footer h1, #standard-footer h2, #standard-footer h3, #standard-footer h4, #standard-footer h5, #standard-footer h6{ color: #505050;}
    #standard-footer ul{ list-style: none; margin: 0; padding: 0;}
    #standard-footer ul li{}
    #standard-footer ul li a{ color: #505050;}
    #standard-footer ul li a:hover{ text-decoration: underline;}
    #standard-footer h4 {
      font-weight: bold;
      text-transform: uppercase;
      font-size: 0.9em;
    }
  </style>
  <div class="footer-main">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-6 col-md-6 footer-widget footer-about">
          <div class="row">
            <div class="col-sm-6">
              <img loading="lazy" width="200px" class="footer-logo" src="//gwhs.i.gov.ph/gwt-footer/govph-seal-mono-footer.jpg" alt="GOVPH SEAL">
            </div>
            <div class="col-sm-6">
              <h4>Republic of the Philippines</h4>
              <p>All content is in the public domain unless otherwise stated.</p>
            </div>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
          <h3>About GOVPH</h3>
          <p>Learn more about the Philippine government, its structure, how government works and the people behind it.</p>
          <ul class="">
            <ul>
              <li><a href="https://www.gov.ph/">GOV.PH</a></li>
              <li><a href="https://www.gov.ph/data">Open Data Portal</a></li>
              <li><a href="https://www.officialgazette.gov.ph">Official Gazette</a></li>
            </ul>
          </ul>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
          <h3 class="widget-title">GOVERNMENT LINKS</h3>
          <ul class="">
            <li><a href="https://op-proper.gov.ph/">Office of the President</a></li>
            <li><a href="https://ovp.gov.ph/">Office of the Vice President</a></li>
            <li><a href="https://www.senate.gov.ph/">Senate of the Philippines</a></li>
            <li><a href="https://www.congress.gov.ph/">House of Representatives</a></li>
            <li><a href="https://sc.judiciary.gov.ph/">Supreme Court</a></li>
            <li><a href="https://ca.judiciary.gov.ph/">Court of Appeals</a></li>
            <li><a href="https://sb.judiciary.gov.ph/">Sandiganbayan</a></li>
          </ul>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->
  <div class="copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="copyright-info text-center text-md-left">
              <span>SRA &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, ALL RIGHTS RESERVED.</span>
          </div>
        </div>

        <div class="col-md-6">
          <div class="footer-menu text-center text-md-right">
            <ul class="list-unstyled">

            </ul>
          </div>
        </div>
      </div><!-- Row end -->

      <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top">
          <i class="fa fa-angle-double-up"></i>
        </button>
      </div>

    </div><!-- Container end -->
  </div><!-- Copyright end -->
</footer><!-- Footer end -->