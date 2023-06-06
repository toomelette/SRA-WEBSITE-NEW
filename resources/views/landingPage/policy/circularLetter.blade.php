<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Circular Letter | SRA</title>

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
              <h1 class="banner-title">Circular Letter</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Policy</li>
                  <li class="breadcrumb-item active" aria-current="page">Circular Letter</li>
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
      <div class="row" >
        <div class="col-lg-12">

          <p>
          @php
            $circular_letter = \App\Models\CircularLetter::query()->get()->sortByDesc('id');
            $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');
            $clYearList = array();
            foreach($circular_letter as $cl){
              array_push($clYearList, $cl->crop_year);
            }
            $clYearList = array_unique($clYearList);
          @endphp
          @if(count($circular_letter) > 0)
            @foreach($crop_year as $cropYear)
              @if(in_array($cropYear->name, $clYearList))

                <div class="accordion accordion-group" id="our-values-accordion">
                  <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$cropYear->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                          CIRCULAR LETTER {!!$cropYear->name!!}
                        </button>

                      </h2>
                    </div>
                    <div id="collapse_{{$cropYear->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                      <div class="card-body">
                        <ul>
                          @foreach ($circular_letter as $circularLetter)
                            @if($cropYear->slug == $circularLetter->crop_year_slug)
                              <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/circular_letter/{!!$circularLetter->slug!!}" >{!!$circularLetter->file_title!!},</a>{!!$circularLetter->title!!}</a></li>
                            @endif
                          @endforeach

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>


                @endif
                @foreach ($circular_letter as $circularLetter)
                @if($cropYear->slug == $circularLetter->crop_year_slug)

                @endif
                @endforeach
                @endforeach
                @endif
                </p>


                {{--          <p>--}}
{{--          @php--}}
{{--            $circular_letter = \App\Models\CircularLetter::query()->get()->sortByDesc('id');--}}
{{--            $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--            $clYearList = array();--}}
{{--            foreach($circular_letter as $cl){--}}
{{--              array_push($clYearList, $cl->crop_year);--}}
{{--            }--}}
{{--            $clYearList = array_unique($clYearList);--}}
{{--          @endphp--}}
{{--          @if(count($circular_letter) > 0)--}}
{{--            @foreach($crop_year as $cropYear)--}}
{{--              @if(in_array($cropYear->name, $clYearList))--}}
{{--                <h4>Series of {!!$cropYear->name!!}</h4>--}}
{{--              @endif--}}
{{--              @foreach ($circular_letter as $circularLetter)--}}
{{--                @if($cropYear->slug == $circularLetter->crop_year_slug)--}}
{{--                  <ul>--}}
{{--                    <li><a style="color: #ffb600" href="/home/sra_website/{!!$circularLetter->path!!}" target="_blank">{!!$circularLetter->file_title!!}, </a>{!!$circularLetter->title!!}</li>--}}
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
