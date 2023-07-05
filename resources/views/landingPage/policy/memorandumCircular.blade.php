<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Memorandum Circular | SRA</title>

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
              <h1 class="banner-title">Memorandum Circular</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Policy</li>
                  <li class="breadcrumb-item active" aria-current="page">Memorandum Circular</li>
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
            $memorandum_Circular = \App\Models\MemorandumCircular::query()->get()->sortByDesc('date');
            $Year = \App\Models\Year::query()->get()->sortByDesc('id');
            $clYearList = array();
            foreach($memorandum_Circular as $cl){
              array_push($clYearList, $cl->year);
            }
            $clYearList = array_unique($clYearList);
          @endphp
          @if(count($memorandum_Circular) > 0)
            @foreach($Year as $year)
              @if(in_array($year->name, $clYearList))

                <div class="accordion accordion-group text-justify" id="our-values-accordion">
                  <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                          SERIES OF {!!$year->name!!}
                        </button>

                      </h2>
                    </div>
                    <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                      <div class="card-body">
                        <ul>
                          @foreach ($memorandum_Circular as $memorandumCircular)
                            @if($year->name == $memorandumCircular->year)
                              <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/memorandum_circular/{!!$memorandumCircular->slug!!}" >{!!$memorandumCircular->title!!},</a>{!!$memorandumCircular->description!!}</li>
                            @endif
                          @endforeach

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>


                @endif
                @foreach ($memorandum_Circular as $memorandumCircular)
                @if($year->slug == $memorandumCircular->year)

                @endif
                @endforeach
                @endforeach
                @endif
                </p>

{{--          <p>--}}
{{--          @php--}}
{{--            $memorandum_circular = \App\Models\MemorandumCircular::query()->get()->sortByDesc('date');--}}
{{--            $year = \App\Models\Year::query()->get()->sortByDesc('id');--}}
{{--            $mcYearList = array();--}}
{{--            foreach($memorandum_circular as $mC){--}}
{{--              array_push($mcYearList, $mC->year);--}}
{{--            }--}}
{{--            $mcYearList = array_unique($mcYearList);--}}
{{--          @endphp--}}
{{--          @if(count($memorandum_circular) > 0)--}}
{{--            @foreach($year as $seriesYear)--}}
{{--              @if(in_array($seriesYear->name, $mcYearList))--}}
{{--                <h4>Series of {!!$seriesYear->name!!}</h4>--}}
{{--              @endif--}}
{{--              @foreach ($memorandum_circular as $memorandumCircular)--}}

{{--                @if($seriesYear->name == $memorandumCircular->year)--}}
{{--                  <ul>--}}
{{--                    <li><a style="color: #ffb600" href="/view_file/memorandum_circular/{!!$memorandumCircular->slug!!}" target="_blank">{!!$memorandumCircular->file_title!!}, </a>{!!$memorandumCircular->title!!}</li>--}}
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
