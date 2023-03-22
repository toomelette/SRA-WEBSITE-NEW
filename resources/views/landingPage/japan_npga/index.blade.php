<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title> JAPAN NPGA | SRA</title>

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
                            <h1 class="banner-title">JAPAN NPGA</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">SRA</li>
                                    <li class="breadcrumb-item active" aria-current="page">JAPAN NPGA</li>
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


                    <h3>Japan Non-Project Grant Aid (NPGA)</h3>
                    <li class="text-justify"><a target="_blank" href="{{asset('constra/files/Japan-NPGA/2021-MC-5.pdf')}}"><u style="color: green">Memorandum Circular No. 5, </u></a> Series of 2021, Revised Implementing Guidelines of the Japan Non-Project Grant Aid to SRA on Economic and Social Development Programme.</li>
                    <li class="text-justify"><a target="_blank" href="{{asset('constra/files/Japan-NPGA/Japan-NPGA-Notice-to-Concerned.pdf')}}"><u style="color: green">Notice to Concerned Stakeholders,</u></a> The submission of project proposals for the Japan Non-Project Grant Aid Program is extended until August 31, 2021.</li>
                    <li class="text-justify"><a target="_blank" href="{{asset('constra/files/Japan-NPGA/Memo-on-the-Extn-of-Deadline-of-Submission-of-Proj-Proposals-for-Japan-NPGA.pdf')}}"><u style="color: green">Memorandum,</u></a> Extension of the Deadline for the Submission of Project Proposals for the Japan Non-Project Grant Aid (NPGA) <a target="_blank" href="{{asset('constra/files/Japan-NPGA/Japan-NPGA-Operations-Manual.docx')}}"><u style="color: green">Download Operation Manual</u></a>  <a target="_blank" href="{{asset('constra/files/Japan-NPGA/Japan-NPGA-Template-Project-Concept-Note_Japan-Grant-Aid_final.docx')}}"><u style="color: green">Download Template Project Concept.</u></a></li>
                    <li class="text-justify"><a target="_blank" href="{{asset('constra/files/Japan-NPGA/Memorandum-NPGA.pdf')}}"><u style="color: green">Memorandum,</u></a> Call for Submission of Project Proposals for the Japan Non-Project Grant Aid (NPGA).</li>
                    <li class="text-justify"><a target="_blank" href="{{asset('constra/files/Japan-NPGA/2020-MC-14-IMPLEMENTING-GUIDELINES-OF-THE-JAPAN-NON-PROJECT-GRANT-AID-TO-SRA.pdf')}}"><u style="color: green">Memorandum Circular No. 14,</u></a> Series of 2020, Implementing Guidelines of the Japan Non-Project Grant Aid to SRA on Economic and Social Development Programme.</li>
                    {{--                    <p>You may download the <a style="color: green" href="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf')}}" ><u>NAFMIP 2021-2030 PDF file</u></a> and <a style="color: green"  href="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf')}}"><u>Rapid Assessment for Agri-Fisheries Transformation</u></a> here.</p>--}}

{{--                    <h4>NAFMIP 2021-2030</h4>--}}
{{--                    <embed style="border: 10px solid green;" src="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf#toolbar=0')}}" width="100%" height="800px"/>--}}
{{--                    <a href="{{asset('constra/files/NAFMIP/06232022_NAFMIP 2021-2030.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>--}}
{{--                    <br><br><br><br><br><br>--}}

{{--                    <h4>Rapid Assessment for Agri-Fisheries Transformation</h4>--}}
{{--                    <embed style="border: 10px solid green;" src="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf#toolbar=0')}}" width="100%" height="800px"/>--}}
{{--                    <a href="{{asset('constra/files/NAFMIP/RapidAFSectorAssessmentbyNPT.pdf')}}" download class="btn btn-primary"> <i class="fa fa-download"></i>Download File</a>--}}
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
