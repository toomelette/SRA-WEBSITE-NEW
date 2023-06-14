<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title> Bioenergy | SRA</title>

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
                            <h1 class="banner-title">Bioenergy</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">Policy</li>
                                    <li class="breadcrumb-item active" aria-current="page">Bioenergy</li>
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
                        $bio_energy= \App\Models\BioEnergy::query()->get()->sortByDesc('date');
                        /*$crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');
                        $moYearList = array();
                          foreach($molasses_order as $mo){
                            array_push($moYearList, $mo->crop_year);
                          }
                          $moYearList = array_unique($moYearList);*/
                    @endphp
                    @if(count($bio_energy) > 0)
                        @foreach ($bio_energy as $bioEnergy)
                            <ul>
                                <li><a style="color: #ffb600" href="/view_file/bio_energy/{!!$bioEnergy->slug!!}" target="_blank">{!!$bioEnergy->file_title!!}, </a>{!!$bioEnergy->title!!}</li>
                            </ul>
                            @endforeach


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
                            @endif
                            </p>
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
