<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>GAD Videos | SRA</title>

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
                            <h1 class="banner-title">Gender and Development (GAD) GAD Videos</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">GENDER AND DEVELOPMENT
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Videos</li>
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
                    <h2>Gender and Development Videos</h2><br><br>
{{--                    <div class="accordion accordion-group" id="our-values-accordion">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header p-0 bg-transparent" id="headingOne">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                        2019--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}

{{--                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">--}}
{{--                                <div class="card-body text-justify">--}}
{{--                                <li><a class="btn" style="color: #ffb600" href="{{asset("videos/GAD/04-VAW-in-Public-Spaces.mp4")}}" target="_blank"><span class="fa fa-play-circle fa-2x" ></span> </a>&nbsp; VIOLENCE AGAINST WOMEN (VAW) IN PUBLIC SPACES.</li>--}}
{{--                                <li><a class="btn" style="color: #ffb600" href="{{asset("videos/GAD/05-VAW-in-the-Digital-Media.mp4")}}" target="_blank"><span class="fa fa-play-circle fa-2x" ></span> </a>&nbsp; VIOLENCE AGAINST WOMEN (VAW) IN DIGITAL MEDIA</li>--}}

{{--                                    <li><video controls width="600px">--}}
{{--                                            <source src="{{ asset('videos/GAD/05-VAW-in-the-Digital-Media.mp4') }}" type="video/mp4">--}}
{{--                                    </video></li>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header p-0 bg-transparent" id="headingTwo">--}}
{{--                                <h2 class="mb-0">--}}
{{--                                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                        2018--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">--}}
{{--                                <div class="card-body text-justify">--}}
{{--                                    <blockquote><p>By 2040, the Philippines shall have a globally competitive sugarcane industry that supports the food, power, and other related industries through an institutionally competent SRA and committed stakeholders, for a secured future for Filipinos.</p></blockquote>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                    <!--/ Accordion end -->


{{--                    <h4></h4>--}}
                    <p>
                    @php
                        $Template = \App\Models\GAD_videos::query()->get()->sortByDesc('id');
                        $Year = \App\Models\Year::query()->get()->sortByDesc('id');
                        $clYearList = array();
                        foreach($Template as $cl){
                        array_push($clYearList, $cl->year);
                        }
                        $clYearList = array_unique($clYearList);
                    @endphp
                    @if(count($Template) > 0)
                        @foreach($Year as $year)
                            @if(in_array($year->name, $clYearList))

                                <div class="accordion accordion-group text-justify" id="our-values-accordion">
                                    <div class="card">
                                        <div class="card-header p-0 bg-transparent" id="heading1">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                                    {!!$year->name!!}
                                                </button>

                                            </h2>
                                        </div>
                                        <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($Template as $template)
                                                        @if($year->name == $template->year)
                                                            <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/gad_videos/{!!$template->slug!!}"><span class="fa fa-play-circle fa-2x"></span>&nbsp;</a>{!!$template->title!!}</li>

                                                        @endif
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endif
                                @foreach ($Template as $template)
                                @if($year->slug == $template->year)

                                @endif
                                @endforeach
                                @endforeach
                                @endif
                                </p><br>



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
