<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Citizen's Charter | SRA</title>

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
                            <h1 class="banner-title">Citizen's Charter</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
{{--                                    <li class="breadcrumb-item active" aria-current="page">sra</li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">Update</li>--}}
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <p>--}}
{{--                    @php--}}
{{--                        $sugar_supply_demand = \App\Models\SugarSupplyDemand::query()->get()->sortByDesc('id');--}}
{{--                        $crop_year = \App\Models\CropYear::query()->get()->sortByDesc('id');--}}
{{--                        $clYearList = array();--}}
{{--                        foreach($sugar_supply_demand as $cl){--}}
{{--                          array_push($clYearList, $cl->crop_year);--}}
{{--                        }--}}
{{--                        $clYearList = array_unique($clYearList);--}}
{{--                    @endphp--}}
{{--                    @if(count($sugar_supply_demand) > 0)--}}
{{--                        @foreach($crop_year as $cropYear)--}}
{{--                            @if(in_array($cropYear->name, $clYearList))--}}
{{--                                <h4>Series of {!!$cropYear->name!!}</h4>--}}
{{--                            @endif--}}
{{--                            @foreach ($sugar_supply_demand as $sugarSupplyDemand)--}}
{{--                                @if($cropYear->slug == $sugarSupplyDemand->crop_year_slug)--}}
{{--                                    <ul>--}}
{{--                                        <li><a style="color: #ffb600" href="/home/sra_website/{!!$sugarSupplyDemand->path!!}" target="_blank">{!!$sugarSupplyDemand->file_title!!},</a>{!!$sugarSupplyDemand->title!!}</li>--}}
{{--                                    </ul>--}}
{{--                                    @endif--}}
{{--                                    @endforeach--}}
{{--                                    @endforeach--}}
{{--                                    @endif--}}
{{--                                    </p>--}}
{{--                </div><!-- Col end -->--}}
{{--            </div><!-- Content row end -->--}}

{{--        </div><!-- Container end -->--}}
        <div class="container mt-3">
            <h2>Toggleable Tabs</h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">CITIZEN'S CHARTER UPDATES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">CERTIFICATE OF COMPLIANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">EXECUTIVE ORDER</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>CITIZEN CHARTER</h3>
                    <style>
                        table1 {
                            border-top: 5px solid green;

                                }

                    </style>
{{--                    <iframe src="{{asset('constra/files/citizensCharter/SRA-Citizens-Charter-March-2022.jpg')}}" width="100%" height="800px"></iframe>--}}
                    <img width="100%" height="1000px" src="{{asset('constra/files/citizensCharter/SRA-Citizens-Charter-March-2022.jpg')}}">


                    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}

                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>CERTIFICATE OF COMPLIANCE</h3>
                    <h4>March 2022</h4>
                    <embed style="border: 10px solid green; " src="{{asset('constra/files/citizensCharter/cetrificateofCompliance2022/SRA-Cert-Compliance-2022.pdf#toolbar=0')}}" width="100%" height="800px"/>
                    <a href="{{asset('constra/files/citizensCharter/cetrificateofCompliance2022/SRA-Cert-Compliance-2022.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>EXECUTIVE ORDER NO. 631</h3>
                    <embed style="border: 10px solid green;" src="{{asset('constra/files/citizensCharter/exicutive-order/exicutive-order-no-631.pdf#toolbar=0')}}" width="100%" height="800px"/>
                    <a href="{{asset('constra/files/citizensCharter/exicutive-order/exicutive-order-no-631.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>
                </div>
            </div>
        </div>


    </section><!-- Main container end -->

    @include('layouts.constra-footer')

    @include('layouts.constra-js-plugins')
    @yield('scripts')

{{--    <script type="text/javascript">--}}
{{--        function viewNav(routE){--}}
{{--            window.open("{{route('navRoute')}}".replace('navRoute', routE),'_blank').focus();--}}
{{--        }--}}
{{--    </script>--}}

</div><!-- Body inner end -->
</body>

</html>
