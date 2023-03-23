<div id="top-bar" class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <ul class="top-info text-center text-md-left">
          <li >
            <a href="https://goo.gl/maps/s1Nw9SvtgoqFrA818"><i class="fas fa-map-marker-alt"></i></a> <p class="info-text">Sugar Center Bldg., North Avenue, Diliman, Quezon City</p>
          </li>
        </ul>
      </div>
      <!--/ Top info end -->

      <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
        <ul class="list-unstyled">
          <li>
            <a title="Facebook" href="https://www.facebook.com/sugarregulatoryadmin" target="_blank" rel="noopener">
              <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
            </a>
            <a title="Twitter" href="https://twitter.com/Sugar_phils" target="_blank" rel="noopener">
              <span class="social-icon"><i class="fab fa-twitter"></i></span>
            </a>

          </li>
        </ul>
      </div>
      <!--/ Top social end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</div>
<!--/ Topbar end -->

<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <img loading="lazy" src="{{asset('constra/images/sra_head_logo_new.png')}}" alt="Logo">
          </div>
        </div><!-- logo area end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation" style="background-color: green">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar-collapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav mr-auto">
                @php
                  $navigation = \App\Models\Navigation::query()->where('is_main', '=', 1)->orderBy('sequence')->get();
                @endphp
                @if(count($navigation) > 0)
                  @foreach ($navigation as $nav)
                    <li class="nav-item dropdown ">
                      <a style="font-size: 10px;" href="{{ URL::to('/') }}/{!!$nav->route!!}" class="nav-link">{!!$nav->name!!}

{{--                      <a class="btn" style="font-size: 10px;" onclick="viewNav('{!!$nav->route!!}')" class="nav-link dropdown-toggle" data-toggle="dropdown">{!!$nav->name!!}--}}
                        <i class="fa fa-angle-down"></i></a>

                      @php
                        $sub_nav = \App\Models\SubNav::query()->where('nav_main_slug', '=', $nav->slug)->get();
                      @endphp
                      @if(count($sub_nav) > 0)
                        <ul class="dropdown-menu " role="menu">
                          @foreach ($sub_nav as $Snav)
{{--                            <li><a class="btn" onclick="viewNav('{!!$Snav->route!!}')">{!!$Snav->name!!}</a></li>--}}
                            <li><a class="btn" href="{{ URL::to('/') }}/{!!$Snav->route!!}"> {!!$Snav->name!!}</a></li>
                          @endforeach
                        </ul>
                      @endif
                    </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </nav>
        </div>
        <!--/ Col end -->
      </div>
      <!--/ Row end -->

      <div class="nav-search">
        <span id="search"><i class="fa fa-search"></i></span>
      </div><!-- Search end -->

      <div class="search-block" style="display: none;">
        <label for="search-field" class="w-100 mb-0">
          <input type="text" name="search" class="form-control" id="search-field" placeholder="Type what you want and enter">
        </label>
        <span class="search-close">&times;</span>
      </div><!-- Site search end -->


    </div>
    <!--/ Container end -->
  </div>
  <!--/ Navigation end -->
</header>