<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>PHILGEPS Posting | SRA</title>

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
                            <h1 class="banner-title">PHILGEPS Posting</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">Bid Corner</li>
                                    <li class="breadcrumb-item active" aria-current="page">PHILGEPS Posting</li>
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
                        $philgepsPosting = \App\Models\PhilgepsPosting::query()->get()->sortByDesc('id');
                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');
                        $clYearList = array();
                        foreach($philgepsPosting as $cl){
                          array_push($clYearList, $cl->crop_year);
                          array_push($clYearList, $cl->crop_year);
                        }
                        $clYearList = array_unique($clYearList);
                    @endphp
                    @if(count($philgepsPosting) > 0)
                        @foreach($crop_year as $cropYear)
                            @if(in_array($cropYear->name, $clYearList))
                                <h4>Series of {!!$cropYear->name!!}</h4>
                            @endif
                            @foreach ($philgepsPosting as $philgeps_posting)
                                @if($cropYear->slug == $philgeps_posting->crop_year_slug)
                                    <ul>
                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$philgeps_posting->path!!}" target="_blank">{!!$philgeps_posting->file_title!!}, </a>{!!$philgeps_posting->title!!}</li>
                                    </ul>
                                    @endif
                                    @endforeach
                                    @endforeach
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
