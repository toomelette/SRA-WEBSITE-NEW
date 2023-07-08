<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>GAD Memorandum | SRA</title>

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
              <h1 class="banner-title">Gender and Development (GAD)</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Gender and Development</li>
                  <li class="breadcrumb-item active" aria-current="page">Memorandum</li>
                </ol>
              </nav>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container mb-lg-5 mt-lg-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-justify">
            <h2>Gender and Development Memorandum</h2><br><br>
          <p>
                                                        @php
                                                            $vacant_position = \App\Models\GAD_memorandum::query()->get()->sortByDesc('id');
                                                            $Year = \App\Models\Year::query()->get()->sortByDesc('id');
                                                            $clYearList = array();
                                                            foreach($vacant_position as $cl){
                                                              array_push($clYearList, $cl->year);
                                                            }
                                                            $clYearList = array_unique($clYearList);
                                                        @endphp
                                                        @if(count($vacant_position) > 0)
                                                            @foreach($Year as $year)
                                                                @if(in_array($year->name, $clYearList))

                                                                    <div class="accordion accordion-group text-justify" id="our-values-accordion">
                                                                        <div class="card">
                                                                            <div class="card-header p-0 bg-transparent" id="heading1">
                                                                                <h2 class="mb-0">
                                                                                    <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                                                                         Series of {!!$year->name!!}
                                                                                    </button>

                                                                                </h2>
                                                                            </div>
                                                                            <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                                                                                <div class="card-body">
                                                                                    <ul>
                                                                                        @foreach ($vacant_position as $vacantPosition)
                                                                                            @if($year->name == $vacantPosition->year)
                                                                                                <li> <a class="btn text-uppercase text-strong" style="color: #ffb600" target="_blank" href="/view_file/gad_memorandum/{!!$vacantPosition->slug!!}">
                                                                                                        {!!$vacantPosition->title !!},<a>{!!$vacantPosition->description!!}</li>
                                                                                            @endif
                                                                                        @endforeach

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    @endif
                                                                    @foreach ($vacant_position as $vacantPosition)
                                                                    @if($year->slug == $vacantPosition->year)

                                                                    @endif
                                                                    @endforeach
                                                                    @endforeach
                                                                    @endif
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
