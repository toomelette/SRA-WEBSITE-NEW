<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>SIDA Updates | SRA</title>

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
                            <h1 class="banner-title">SIDA Updates</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SIDA</li>
                                    <li class="breadcrumb-item active" aria-current="page">SIDA Updates</li>
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
            <div class="card">
                <div class="col-lg-12">

                    <!-- Gallery -->
                    <div class="row">
                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <a href=""><img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Boat on Calm Water"
                            /></a>

                            <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Wintry Mountain Landscape"
                            />
                        </div>

                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Mountains in the Clouds"
                            />

                            <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Boat on Calm Water"
                            />
                        </div>

                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Waves at Sea"
                            />

                            <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
                                    class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Yosemite National Park"
                            />
                        </div>
                    </div>
                    <!-- Gallery -->

{{--                    <a href="/ph_tp_seal/index"> <img src="{{asset('constra/images/pin.png')}}" height="50%" width="50%"></a>--}}
{{--                        <div class="card-img-overlay">--}}
{{--                            <div class="card-body text-dark">--}}
{{--                                <p class="card-title display-1 font-weight-bolder">Sample</p>--}}
{{--                                <p class="card-subtitle display-4 font-weight-light"> The Subtitle</p>--}}
{{--                                <p class="card-text"> dklasjdkljaskdjklsajdiowdjskljdklsajdj kasdjkl  kjaksdjj9jskd jkjklsdippa jkkljsdklj kjkljsd jwjdi j</p>--}}
{{--                            </div>--}}
                        </div>




{{--                    <p>--}}
{{--                    @php--}}
{{--                        $sida_updates = \App\Models\SidaUpdates::query()->get()->sortByDesc('id');--}}
{{--                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--                        $clYearList = array();--}}
{{--                        foreach($sida_updates as $cl){--}}
{{--                          array_push($clYearList, $cl->crop_year);--}}
{{--                        }--}}
{{--                        $clYearList = array_unique($clYearList);--}}
{{--                    @endphp--}}
{{--                    @if(count($sida_updates) > 0)--}}
{{--                        @foreach($crop_year as $cropYear)--}}
{{--                            @if(in_array($cropYear->name, $clYearList))--}}
{{--                                <h4>Series of {!!$cropYear->name!!}</h4>--}}
{{--                            @endif--}}
{{--                            @foreach ($sida_updates as $sidaUpdates)--}}
{{--                                @if($cropYear->slug == $sidaUpdates->crop_year_slug)--}}
{{--                                    <ul>--}}
{{--                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$sidaUpdates->path!!}" target="_blank">{!!$sidaUpdates->file_title!!}, </a>{!!$sidaUpdates->title!!}</li>--}}
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
