<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title> NAFMIP | SRA</title>

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
                            <h1 class="banner-title">NAFMIP</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SRA</li>
                                    <li class="breadcrumb-item active" aria-current="page">NAFMIP</li>
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
                <div class="col-lg-12 text-justify">
{{--                    <p>--}}
{{--                    @php--}}
{{--                        $bio_energy= \App\Models\BioEnergy::query()->get()->sortByDesc('id');--}}
{{--                        /*$crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--                        $moYearList = array();--}}
{{--                          foreach($molasses_order as $mo){--}}
{{--                            array_push($moYearList, $mo->crop_year);--}}
{{--                          }--}}
{{--                          $moYearList = array_unique($moYearList);*/--}}
{{--                    @endphp--}}
{{--                    @if(count($bio_energy) > 0)--}}
{{--                        @foreach ($bio_energy as $bioEnergy)--}}
{{--                            <ul>--}}
{{--                                <li><a style="color: #ffb600" href="/home/sra_website/{!!$bioEnergy->path!!}" target="_blank">{!!$bioEnergy->file_title!!}, </a>{!!$bioEnergy->title!!}</li>--}}
{{--                            </ul>--}}
{{--                            @endforeach--}}


                            {{--            @foreach($crop_year as $cropYear)--}}
                            {{--              @if(in_array($cropYear->name, $moYearList))--}}
                            {{--                <h4>Series of {!!$cropYear->name!!}</h4>--}}
                            {{--              @endif--}}
                            {{--              @foreach ($molasses_order as $molassesOrder)--}}
                            {{--                @if($cropYear->slug == $molassesOrder->crop_year_slug)--}}
                            {{--                  <ul>--}}
                            {{--                    <li><a style="color: #ffb600" href="/home/sra_website/{!!$molassesOrder->path!!}" target="_blank">{!!$molassesOrder->file_title!!}, </a>{!!$molassesOrder->title!!}</li>--}}
                            {{--                  </ul>--}}
                            {{--                @endif--}}
                            {{--              @endforeach--}}
                            {{--            @endforeach--}}
{{--                            @endif--}}
{{--                            </p>--}}

                    <h3>National Agriculture and Fisheries Modernization and Industrialization Plan 2021-2030</h3>
                    <p>NAFMIP 2021-2030, as a whole-of-nation plan, serves as a Directional Plan to steer sector-wide growth over the next decade. It will guide the trajectory of more detailed and operations-oriented agri-fishery development plans such as the commodity system roadmaps, Provincial Commodity Investment Plans (PCIPs), and Comprehensive Land Use Plans (CLUP). Thus, NAFMIP is more policy- and strategy-oriented, but not as detailed as previous AFMP iterations.</p>
                    <p>Further, NAFMIP shall aim to inspire the full range of private and public stakeholders to take coordinated, cohesive, and determined actions toward achieving a common vision and objectives, and to galvanize sector-wide public and private investments and resources to support the shared vision, objectives, and concerted action.</p>
                    <p>NAFMIP will seek to more than double smallholder farmers’ and fishers’ incomes to be able to meet their family household needs during the period of Plan implementation, through the promotion of transformative interventions to significantly diversify sources of income and employment—and ultimately sustainably lift farmers and fisherfolk out of poverty. This objective will be achieved with minimal impact on the environment and without sacrificing the nutrition and health of consumers. One key strategy is to diversify farming, non-farming, and value adding activities and link farmers and fisherfolk to large private investments such as modern food terminals and market hubs serving as potent engines of inclusive growth.</p>
{{--                    <p>You may download the <a style="color: green" href="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf')}}" ><u>NAFMIP 2021-2030 PDF file</u></a> and <a style="color: green"  href="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf')}}"><u>Rapid Assessment for Agri-Fisheries Transformation</u></a> here.</p>--}}

                    <h4>NAFMIP 2021-2030</h4>
                    <embed style="border: 10px solid green;" src="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf#toolbar=0')}}" width="100%" height="800px"/>
                    <a href="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>
                    <br><br><br><br><br><br>

                    <h4>Rapid Assessment for Agri-Fisheries Transformation</h4>
                    <embed style="border: 10px solid green;" src="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf#toolbar=0')}}" width="100%" height="800px"/>
                    <a href="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>
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
