<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Expired Import Clearance | SRA</title>

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
                            <h1 class="banner-title">Expired Import Clearance</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">Industry Update</li>
                                    <li class="breadcrumb-item active" aria-current="page">Expired Import Clearance</li>
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
                        $expired_import_clearance = \App\Models\ExpiredImportClearance::query()->get()->sortByDesc('id');
                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');
                        $clYearList = array();
                        foreach($expired_import_clearance as $cl){
                          array_push($clYearList, $cl->crop_year);
                        }
                        $clYearList = array_unique($clYearList);
                    @endphp
                    @if(count($expired_import_clearance) > 0)
                        @foreach($crop_year as $cropYear)
                            @if(in_array($cropYear->name, $clYearList))
                                <h4>Series of {!!$cropYear->name!!}</h4>
                            @endif
                            @foreach ($expired_import_clearance as $expiredImportClearance)
                                @if($cropYear->slug == $expiredImportClearance->crop_year_slug)
                                    <ul>
                                        <li><a style="color: #ffb600" href="/view_file/expired_import_clearance/{!!$expiredImportClearance->slug!!}" target="_blank">{!!$expiredImportClearance->file_title!!}, </a>{!!$expiredImportClearance->title!!}</li>
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
