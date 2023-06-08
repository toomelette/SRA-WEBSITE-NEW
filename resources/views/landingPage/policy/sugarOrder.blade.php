<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Sugar Order | SRA</title>

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
              <h1 class="banner-title">Sugar Order</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Policy</li>
                  <li class="breadcrumb-item active" aria-current="page">Sugar Order</li>
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
          @php
            $sugar_order = \App\Models\SugarOrder::query()->get()->sortByDesc('id');
            $clYearList = [];
            foreach($sugar_order as $order){
              $clYearList[$order->crop_year][$order->slug] =  $order;
            }
            krsort($clYearList);;
          @endphp
          @foreach($clYearList as $slug => $year)
            <div class="accordion accordion-group text-justify" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="heading1">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                      SUGAR ORDER {!!$slug!!}
                    </button>

                  </h2>
                </div>
                <div id="collapse_{{$slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                  <div class="card-body">
                    <ul>
                      @foreach ($year as $sugarOrder)
                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/sugar_order/{!!$sugarOrder->slug!!}" >{!!$sugarOrder->file_title!!},</a>{!!$sugarOrder->title!!}</a></li>
                      @endforeach

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
