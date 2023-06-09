<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Sugar Supply and Demand Situation | SRA</title>

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
                    <div class="error-page">
                        <h2 class="headline text-yellow"> <span class="text-danger">404</span> | Oops! Page not found.</h2>
                        <div class="error-content">
                            <p>
                                The page you are looking for was moved, removed,
                                renamed or might never existed.
                            </p>
                            @if(!empty($exception->getMessage()))
                                <p class="text-info">{{$exception->getMessage()}}</p>
                            @endif

                        </div>
                    </div>


                </div>
            </div>
        </div>


</section>




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
