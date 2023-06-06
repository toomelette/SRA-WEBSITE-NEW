<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Office Circular | SRA</title>

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
              <h1 class="banner-title">Office Circular</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Policy</li>
                  <li class="breadcrumb-item active" aria-current="page">Office Circular</li>
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
          @php
            $office_circular = \App\Models\OfficeCircular::query()->get()->sortByDesc('id');
            $Year = \App\Models\Year::query()->get()->sortByDesc('id');
            $clYearList = array();
            foreach($office_circular as $cl){
              array_push($clYearList, $cl->year);
            }
            $clYearList = array_unique($clYearList);
          @endphp
          @if(count($office_circular) > 0)
            @foreach($Year as $year)
              @if(in_array($year->name, $clYearList))

                <div class="accordion accordion-group text-justify" id="our-values-accordion">
                  <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                          OFFICE CIRCULAR ({!!$year->name!!})
                        </button>

                      </h2>
                    </div>
                    <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                      <div class="card-body">
                        <ul>
                          @foreach ($office_circular as $officeCircular)
                            @if($year->name == $officeCircular->year)
                              <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/office_circular/{!!$officeCircular->slug!!}" >{!!$officeCircular->file_title!!},</a>{!!$officeCircular->title!!}</a></li>
                            @endif
                          @endforeach

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>


                @endif
                @foreach ($office_circular as $officeCircular)
                @if($year->slug == $officeCircular->year)

                @endif
                @endforeach
                @endforeach
                @endif
                </p>

{{--          <p>--}}
{{--          @php--}}
{{--            $office_circular = \App\Models\OfficeCircular::query()->get()->sortByDesc('id');--}}
{{--            $year = \App\Models\Year::query()->get()->sortByDesc('id');--}}
{{--            $ocYearList = array();--}}
{{--            foreach($office_circular as $oC){--}}
{{--              array_push($ocYearList, $oC->year);--}}
{{--            }--}}
{{--            $ocYearList = array_unique($ocYearList);--}}
{{--          @endphp--}}
{{--          @if(count($office_circular) > 0)--}}
{{--            @foreach($year as $seriesYear)--}}
{{--              @if(in_array($seriesYear->name, $ocYearList))--}}
{{--                <h4>Series of {!!$seriesYear->name!!}</h4>--}}
{{--              @endif--}}
{{--              @foreach ($office_circular as $officeCircular)--}}

{{--                @if($seriesYear->name == $officeCircular->year)--}}
{{--                  <ul>--}}
{{--                    <li><a style="color: #ffb600" href="/home/sra_website/{!!$officeCircular->path!!}" target="_blank">{!!$officeCircular->file_title!!}, </a>{!!$officeCircular->title!!}</li>--}}
{{--                  </ul>--}}
{{--                @endif--}}
{{--              @endforeach--}}
{{--            @endforeach--}}
{{--          @endif--}}
{{--          </p>--}}
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
