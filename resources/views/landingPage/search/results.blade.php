<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Result | SRA</title>

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



    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">



                    <h2>Search Result for: "{{$query}}"</h2><br>

                    @if ($results->isEmpty())
                        <div class="col-lg-offset-8 no-margin">
                            <table class="table table-bordered" style="border-color: black;">
                                <tr style="">
                                    <div class="input-group col-sm-6">
                                    <form class="search-form " role="search" action="{{'results'}}" method="GET" >
{{--                                        <input type="text" class="col-lg-6 rounded-left" name="query" placeholder="Search" style="background-color: whitesmoke; border-radius: 1px;">--}}
{{--                                        <button type="submit" style="color: green; background-color: darkseagreen; width: 50px;" class="rounded-right"><span class="fa fa-search"></span></button>--}}


                                            <input type="text" name="query" class="form-control  no-padding" placeholder="Search" style="padding-bottom: 1px;">
                                            <div class="input-group-btn">
                                                <button type="submit" name="submit" class="btn btn-warning rounded-0 rounded-right" style="padding-bottom: 12px; color: white;"><i class="fa fa-search"></i>
                                                </button>
                                            </div>

                                    </form>
                                    </div>
                                </tr>
                                <tr>
                                    <p><span class="fa fa-search" style="width: 20px;"></span>No results found for <strong> "{{ $query }}"</strong>.</p>
                                </tr>
                                <tr>
                                    @else

                                        <ul style="font-size: larger; solid-color: black;">
                                            @foreach($results as $result)
                                                <li><a href="{{URL::to('/')}}/{!! $result->route!!}" >{{ $result->name }}</a></li><br>
                                            @endforeach
                                            @endif
                                        </ul>
                                </tr>

                        </table>

                </div><!-- Col end -->

                <div class="col-lg-12">

                    <h2>FILES RELATED TO "{{$query}}"</h2><br>

                    @if (empty($fileResults))
                        <p><span class="fa fa-search" style="width: 20px;"></span>No files found related to <strong> "{{ $query }}"</strong>.</p>
                    @else
                        <ul style="font-size: larger; solid-color: black;">
{{--                            <iframe src="http://localhost:8003/search/results?query=#result" width="600px" height="1000px"></iframe>--}}
                            @foreach($fileResults as $result)


                                    <table style="height: auto;" id="result">
                                        <tr>
                                            <td>
                                                <img loading="lazy" class="testimonial-thumb" src="{{asset('constra/images/SRA/pdfDefault.gif')}}" alt="PDF LOGO">
                                            </td>
                                            <td>
                                            <a class="text-info" href="{{route('view_file',[$result->table_name,$result->slug])}}" target="_blank">
                                                {{$result->title}}</a>
                                            </td><br>



                                        </tr>
                                </table>

                            @endforeach

                            @endif


                        </ul>



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
