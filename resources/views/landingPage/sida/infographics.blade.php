<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Infographics | SRA</title>

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
                            <h1 class="banner-title">Infographics</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SIDA</li>
                                    <li class="breadcrumb-item active" aria-current="page">Infographics</li>
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
            <div class="">
                    <div class="col-lg-12">

                        <h3>About Us</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/About-SIDA.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>SIDA Program Updates</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/sida-program-updates-edited.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>Socialized Credit Program</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/SCP_Dec2020.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>Scholarship Program</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/Scholarship-Program.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>RDE Program</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/RDE-Program.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>Infra Program</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/Infra-Program.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                        <h3>Block Farm Program</h3>
                        <embed style="border: 3px solid green;"  src="{{asset('constra/files/SIDA/Sida_Infographics/Block-Farm-Program.pdf#toolbar=0')}}" width="100%" height="600"/><br><br><br>

                    </div>





{{--                    <p>--}}
{{--                    @php--}}
{{--                        $infographics = \App\Models\SidaUpdates::query()->get()->sortByDesc('id');--}}
{{--                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--                        $clYearList = array();--}}
{{--                        foreach($infographics as $cl){--}}
{{--                          array_push($clYearList, $cl->crop_year);--}}
{{--                          array_push($clYearList, $cl->crop_year);--}}
{{--                        }--}}
{{--                        $clYearList = array_unique($clYearList);--}}
{{--                    @endphp--}}
{{--                    @if(count($infographics) > 0)--}}
{{--                        @foreach($crop_year as $cropYear)--}}
{{--                            @if(in_array($cropYear->name, $clYearList))--}}
{{--                                <h4>Series of {!!$cropYear->name!!}</h4>--}}
{{--                            @endif--}}
{{--                            @foreach ($infographics as $infogRaphics)--}}
{{--                                @if($cropYear->slug == $infogRaphics->crop_year_slug)--}}
{{--                                    <ul>--}}
{{--                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$infogRaphics->path!!}" target="_blank">{!!$infogRaphics->file_title!!}, </a>{!!$infogRaphics->title!!}</li>--}}
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
