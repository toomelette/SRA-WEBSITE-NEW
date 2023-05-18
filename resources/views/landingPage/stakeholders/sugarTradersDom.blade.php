<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Stakeholders | SRA</title>

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
                            <h1 class="banner-title">Sugar Traders Domestic</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">Stakeholders</li>
                                    <li class="breadcrumb-item active" aria-current="page">Sugar Traders Domestic</li>
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
                    <h2>Sugar Traders (Domestic)</h2><br><br>
                    <p>
                    @php
                        $application_form = \App\Models\StkSugarTradersDom::query()->get()->sortBy('id');
                    @endphp
                    @if(count($application_form) > 0)
                        <ul>
                            <div class="row">
                                @foreach ($application_form as $applicationForm)
                                    <div class="col-4">
                                        <img loading="lazy" class="testimonial-thumb" src="{{asset('constra/images/SRA/pdfDefault.gif')}}" alt="PDF LOGO">
                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$applicationForm->path!!}" target="_blank"> {!!$applicationForm->year!!}</a><br>{!!$applicationForm->title!!}</li><br><br>
                                    </div>
                                @endforeach
                            </div>
                        </ul>
                        @endif
                    </p>

                    <p>
{{--                    @php--}}
{{--                        $vacant_position = \App\Models\VacantPosition::query()->get()->sortByDesc('id');--}}
{{--                        $Year = \App\Models\Year::query()->get()->sortByDesc('id');--}}
{{--                        $clYearList = array();--}}
{{--                        foreach($vacant_position as $cl){--}}
{{--                          array_push($clYearList, $cl->year);--}}
{{--                        }--}}
{{--                        $clYearList = array_unique($clYearList);--}}
{{--                    @endphp--}}
{{--                    @if(count($vacant_position) > 0)--}}
{{--                        @foreach($Year as $year)--}}
{{--                            @if(in_array($year->name, $clYearList))--}}

{{--                                <div class="accordion accordion-group text-justify" id="our-values-accordion">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header p-0 bg-transparent" id="heading1">--}}
{{--                                            <h2 class="mb-0">--}}
{{--                                                <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">--}}
{{--                                                    Vacant Position Year {!!$year->name!!}--}}
{{--                                                </button>--}}

{{--                                            </h2>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <ul>--}}
{{--                                                    @foreach ($vacant_position as $vacantPosition)--}}
{{--                                                        @if($year->name == $vacantPosition->year)--}}
{{--                                                            <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/home/sra_website/{!!$vacantPosition->path!!}" >--}}
{{--                                                                    <img loading="lazy" width="50px" height="50px" class="testimonial-thumb" src="{{ url('constra/images/SRA/SRA_DA logo.png') }}" alt="">--}}
{{--                                                                    <a>{!!$vacantPosition->title!!}</a></li>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}

{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                @endif--}}
{{--                                @foreach ($vacant_position as $vacantPosition)--}}
{{--                                @if($year->slug == $vacantPosition->year)--}}

{{--                                @endif--}}
{{--                                @endforeach--}}
{{--                                @endforeach--}}
{{--                                @endif--}}
                                </p>


{{--                    <p>--}}
{{--                    @php--}}
{{--                        $vacant_position = \App\Models\VacantPosition::query()->get()->sortByDesc('id');--}}
{{--                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--                        $clYearList = array();--}}
{{--                        foreach($vacant_position as $cl){--}}
{{--                          array_push($clYearList, $cl->crop_year);--}}
{{--                        }--}}
{{--                        $clYearList = array_unique($clYearList);--}}
{{--                    @endphp--}}
{{--                    @if(count($vacant_position) > 0)--}}
{{--                        @foreach($crop_year as $cropYear)--}}
{{--                            @if(in_array($cropYear->name, $clYearList))--}}
{{--                                <h4>Series of {!!$cropYear->name!!}</h4>--}}
{{--                            @endif--}}
{{--                            @foreach ($vacant_position as $vacantPosition)--}}
{{--                                @if($cropYear->slug == $vacantPosition->crop_year_slug)--}}
{{--                                    <ul>--}}
{{--                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$vacantPosition->path!!}" target="_blank">{!!$vacantPosition->file_title!!}, </a>{!!$vacantPosition->title!!}</li>--}}
{{--                                    </ul>--}}
{{--                                    @endif--}}
{{--                                    @endforeach--}}
{{--                                    @endforeach--}}
{{--                                    @endif--}}
{{--                                    </p>--}}
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
