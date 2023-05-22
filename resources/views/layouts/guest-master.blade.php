<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>SRA | Sugar Regulatory Administration</title>

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

  <div class="banner-carousel banner-carousel-1 mb-0">

{{--    <div class="banner-carousel-item" style="background-image:url({{asset('constra/images/slider-main/2023-NWMC.jpg')}})"></div>--}}

    <div class="banner-carousel-item" style="background-image:url({{asset('constra/images/slider-main/Tubo-LGAREC3.jpg')}})">
      <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12 text-center">
              <h2 class="slide-title" data-animation-in="slideInLeft" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600;">For the Filipino People</h2>
              <h3 class="slide-sub-title " data-animation-in="slideInRight" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600; ">Sugar Center</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url({{asset('constra/images/slider-main/Tubo-LGAREC1.jpg')}})">
      <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12">
              <h2 class="slide-title-box" data-animation-in="slideInDown" >World Class Service</h2>
              <h3 class="slide-sub-title" data-animation-in="slideInRight" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600;">Republic of the Philippines</h3>
              <h3 class="slide-sub-title" data-animation-in="slideInRight" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600;">Sugar Regulatory Administration</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url({{asset('constra/images/slider-main/Tubo-LGAREC2.jpg')}})">
      <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12">
              <h2 class="slide-title" data-animation-in="slideInDown" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600;">World Class</h2>
              <h3 class="slide-sub-title" data-animation-in="slideInRight" style="text-shadow: -2px -2px 0 #ffb600, 2px -2px 0 #ffb600, -2px 2px 0 #ffb600, 2px 2px 0 #ffb600;">Sugar Quality</h3>
              <p class="slider-description lead" data-animation-in="slideInRight">We will deal with your failure that determines how you achieve success.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="call-to-action-box no-padding">
    <div class="container">
      <div class="action-style-box">
        <div class="row align-items-center">

          <div class="col-md-2 col-sm-6 ml-4 ts-facts">
            <div class="ts-facts-img">
              <a href="/citizensCharter/citizensCharter"><img loading="lazy" width="110%" src="{{asset('constra/images/SRA/sra_citizens_charter_logo.png')}}" alt="facts-img"></a>
            </div>

          </div><!-- Col end -->

          <div class="col-md-2 col-sm-6 ts-facts mt-5 mt-sm-0 ml-3">
            <div class="ts-facts-img">
              <a href="/ph_tp_seal/index"><img loading="lazy" width="80%" src="{{asset('constra/images/SRA/Translogo.png')}}" alt="facts-img"></a>
            </div>

          </div><!-- Col end -->

          <div class="col-md-2 col-sm-6 ts-facts mt-5 mt-md-0 ml-3">
            <div class="ts-facts-img">
              <img loading="lazy" width="80%" src="{{asset('constra/images/SRA/GCG-logo.png')}}" alt="facts-img">
            </div>

          </div><!-- Col end -->

          <div class="col-md-2 col-sm-6 ts-facts mt-5 mt-md-0 ml-3">
            <div class="ts-facts-img">
              <a href="https://www.foi.gov.ph/" target="_blank"><img loading="lazy" width="85%" src="{{asset('constra/images/SRA/foi_logo-300x300.png')}}" alt="facts-img"></a>
            </div>

          </div>

{{--          <div class="col-md-2 col-sm-6 ts-facts mt-5 mt-md-0">--}}
{{--            <div class="ts-facts-img">--}}
{{--                <a target="_blank" href="https://www.lbp-eservices.com/egps/portal/index.jsp"><img loading="lazy" width="100%" src="{{asset('constra/images/SRA/linkbizbtn_wbg-300x135.png')}}" alt="facts-img"></a>--}}

{{--              <img class="mt-3" loading="lazy" width="80%" src="{{asset('constra/images/SRA/NAFMIP1.jpg')}}" alt="facts-img">--}}
{{--            </div>--}}
{{--          </div>--}}

          <div class="col-md-2 col-sm-6 ts-facts mt-4 mt-md-0 ml-3">
            <div class="ts-facts-img">
{{--              <img loading="lazy" width="80%" src="{{asset('constra/images/SRA/japan-npga-300x112.png')}}" alt="facts-img">--}}

              <img   loading="lazy" width="150%" height="120%" src="{{asset('constra/images/SRA/TUV.jpg')}}" alt="facts-img">
            </div>

          </div>
          <!-- <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">We understand your needs on construction</h3>
              </div>
          </div>
          <div class="col-md-12 text-center mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">Industry Update</a>
              </div>
          </div>col end -->
        </div><!-- row end -->
      </div><!-- Action style box -->
    </div><!-- Container end -->
  </section><!-- Action end -->

  <section id="ts-features" class="ts-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="ts-intro">
            <div class="container">
              <h4 style="font-size: 32px;" class="section-sub-title">Latest Industry Updates</h4>
              <table class="table table-condensed text-justify" style="width: 100%">
                <tr>
                    <td style="width: 70%" >Sugar Supply and Demand Situation</td>
                  @php
                    $latest_sugarSupplyDemand = \App\Models\SugarSupplyDemand::query()->orderby('date','desc')->first();
                    $weekly_comparative_production = \App\Models\WeeklyComparativeProduction::query()->orderByDesc('date')->limit(1)->get();
                    $sugarStatistics = \App\Models\SugarStatistics::query()->orderby('date','desc')->limit(1)->get();
                    $metroManilaPrices = \App\Models\MetroManilaPrices::query()->orderBy('date', 'desc')->limit(1)->get();
                    $millsitePrices = \App\Models\MillsitePrices::query()->orderBy('date', 'desc')->limit(1)->get();
                    $bioethanolRF = \App\Models\BioethanolReferencePrice::query()->orderBy('date', 'desc')->limit(1)->get();
                    $circularletter = \App\Models\CircularLetter::query()->orderByDesc('date')->limit(1)->get();
                    $memorandomCercular = \App\Models\MemorandumCircular::query()->orderBy('date', 'desc')->limit(1)->get();
                    $sugar_order = \App\Models\SugarOrder::query()->orderBy('date', 'desc')->limit(1)->get();
                  @endphp

                  @if(! empty($latest_sugarSupplyDemand))

                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_sugarSupplyDemand->path!!}"><u>{{Carbon::parse($latest_sugarSupplyDemand->date)->format('F j, Y')}}</u></a></td>
                  @endif
                </tr>
                <tr>
                    <td>Weekly Comparative Production</td>
                  @foreach($weekly_comparative_production as $WCP)
                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!! $WCP->path !!}"><u>{{carbon::parse($WCP->date)->format('F j, Y')}}</u></a></td>
                    @endforeach
                </tr>
                <tr>
                    <td>Sugar Statistics</td>

                @foreach($sugarStatistics as $latest_SS)
                  <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_SS->path!!}"><u>{{Carbon::parse($latest_SS->date)->format('F j, Y')}}</u></a></td>
                @endforeach
                </tr>
                <tr>
                    <td>Sugar Prices in Metro Manila</td>
                  @foreach($metroManilaPrices as $latest_MMP)
                  <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_MMP->path!!}"><u>{{Carbon::parse($latest_MMP->date)->format('F j, Y')}}</u></a></td>
                  @endforeach

                </tr>
                <tr>
                    <td>Weekly Millsite Prices of Sugar and Molasses</td>
                  @foreach($millsitePrices as $latest_MSP)
                  <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_MSP->path!!}"><u>{{Carbon::parse($latest_MSP->date)->format('F j, Y')}}</u></a></td>
                  @endforeach

                </tr>
                <tr>
                    <td>Bioethanol Reference Price</td>
                  @foreach($bioethanolRF as $latest_BRP)
                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_BRP->path!!}"><u>{{Carbon::parse($latest_BRP->date)->format('F j, Y')}}</u></a></td>
                  @endforeach

                </tr>
                <tr>
{{--                  List of Accredited Customs Bonded Warehouse (CBW) Operators/ Food Processors/ Exporters/ Importers with Approved SRA Clearances of Imported Sugar for the month of January 2023--}}
                  @foreach($circularletter as $latest_circular)
                    <td>{{$latest_circular->title}}</td>
                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_circular->path!!}"><u style="">{{$latest_circular->file_title}}</u></a></td>
                    @endforeach
                </tr>
                <tr>
                  @foreach($sugar_order as $so)
                    <td>{{$so->title}}</td>
                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$so->path!!}"><u style="">{{$so->file_title}}</u></a></td>
                    @endforeach
                </tr>

                <tr>
{{--                  Schedule of Acceptance of Applications and Requirements by the SRA RD in QC and Bacolod under SO 6 s. 2022-23.--}}

                    @foreach($memorandomCercular as $latest_MC)
                    <td>{{$latest_MC->title}}</td>
                    <td style="color: green"><a target="_blank" href="/home/sra_website/{!!$latest_MC->path!!}"><u>{{$latest_MC->file_title}}</u></a></td>
                      @endforeach
                </tr>
              </table>
            </div>



          </div><!-- Intro box end -->

          <div class="gap-20"></div>

        </div><!-- Col end -->


{{--                      <div class="col-lg-6">--}}
{{--                          <div class="ts-intro">--}}
{{--                              <div class="container">--}}
{{--                                  <h2 class="section-sub-title">Bulletin Board</h2>--}}
{{--                                  <table class="table table-condensed">--}}
{{--                                      <tbody>--}}
{{--                                        <tr><td> sample</td></tr>--}}
{{--                                      </tbody>--}}
{{--                                  </table>--}}
{{--                              </div>--}}


{{--                          </div><!-- Intro box end -->--}}

{{--                          <div class="gap-20"></div>--}}

{{--                      </div><!-- Col end -->--}}




        <div class="col-lg-6 mt-4 mt-lg-0">
          <!--<h3 class="into-sub-title">Our Values</h3>
          <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>-->

          <div class="accordion accordion-group" id="our-values-accordion">
            @php
              $navigation_not_main = \App\Models\Navigation::query()->where('is_main', '=', 0)->get();
            @endphp
            @if(count($navigation_not_main) > 0)
              @foreach ($navigation_not_main as $nav_not_main)
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="heading{!!$nav_not_main->sequence!!}">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{!!$nav_not_main->sequence!!}" aria-expanded="{{($nav_not_main->sequence==1)?'true':'false'}}" aria-controls="collapse{!!$nav_not_main->sequence!!}">
                        {!!$nav_not_main->name!!}
                      </button>
                    </h2>
                  </div>
                  <div id="collapse{!!$nav_not_main->sequence!!}" class="collapse {{($nav_not_main->sequence==1)?'show':'       '}}" aria-labelledby="heading{!!$nav_not_main->sequence!!}" data-parent="#our-values-accordion">
                        <div class="card-body">
                          @php
                            $sub_nav_not_main = \App\Models\SubNav::query()->where('nav_main_slug', '=', $nav_not_main->slug)->get();
                          @endphp
                          @if(count($sub_nav_not_main) > 0)
                          <ul>
                          @foreach ($sub_nav_not_main as $Snav_not_main)
{{--                            <li><a class="btn" onclick="viewNav('{!!$Snav_not_main->route!!}')">{!!$Snav_not_main->name!!}</a></li>--}}
                                <li class="text-justify"><a class="btn" href="{{URL::to('/')}}/{!! $Snav_not_main->route!!}">{!!$Snav_not_main->name!!}</a></li>

                          @endforeach
                        </ul>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
          <!--/ Accordion end -->

        </div><!-- Col end -->
      </div><!-- Row end -->

    </div><!-- Container end -->
  </section><!-- Feature are end -->




  <section id="facts" class="facts-area dark-bg">
    <div class="container">
      <div class="facts-wrapper">
        <div class="row">
          <!-- Col end -->

{{--            <div class="container p-3 my-3 border">--}}
{{--                <h1 style="text-align: center; color: whitesmoke; opacity: 0.712417;">Bulletin Board</h1>--}}
{{--                <table class="table table-condensed text-justify" >--}}
{{--                    <tr>--}}
{{--                        <td style="color: whitesmoke">--}}
{{--                          <p style="font-size: 20px;"> Notice To The Public.  &nbsp;<a  class="learn-more d-inline-block" target="_blank" href="{{asset("constra/files/BullitenBoard/NoticetoPublic.pdf")}}" aria-label="read-more"><i class="fa fa-caret-right"></i> Read more</a></p>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <td style="color: whitesmoke">--}}
{{--                            <p style="font-size: 20px;">Notice of Invitation for Additional SPRO II Applicants in Regulation Department-Visayas. &nbsp;<a class="learn-more d-inline-block" target="_blank" href="{{asset("constra/files/BullitenBoard/Notice-of-invitation-for-SPRO-II-Vis.pdf")}}" aria-label="read-more"><i class="fa fa-caret-right"></i> Read more</a></p>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                </table>--}}


            </div>


        </div> <!-- Facts end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Facts end -->

{{--    Bulletin Board--}}
  <section id="news" class="news">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="row text-center">
            <div class="col-12">
              <h3 class="section-sub-title">Bulletin Board</h3>
            </div>
          </div>
          <div class="row facts-wrapper" style="border-right-style: dotted;" >


            <table class="table table-condensed text-justify" >
              @php
                $bulletin_board = \App\Models\BulletinBoard::query()->orderBy('created_at')->limit(5)->get();
              @endphp

              @foreach($bulletin_board as $bb)
                @if($bb->Post >0)
              <tr>
                <td>
                  <img loading="lazy" class="testimonial-thumb" src="{{asset('constra/images/pin.png')}}" alt="">
                </td>
                <td>
                  <b class="d-inline-block" style="font-size: 16px" >{{$bb->title}} <a target="_blank" href="/home/sra_website/{!!$bb->path!!}" style="color: green">Read more..</a> </b>
                </td>

              </tr>
                @endif
              @endforeach
              <tr><td></td><td></td></tr>

            </table>



{{--            @php--}}
{{--              $newsList = \App\Models\News::query()->get();--}}
{{--              $newsImageList = [];--}}
{{--            @endphp--}}
{{--            @if(count($newsList) >0)--}}
{{--              @foreach($newsList as $news)--}}
{{--                @php--}}
{{--                  $ldate = date('Y-m-d');--}}

{{--                  if(Carbon::parse($news->date_start)->format('Y-m-d') <= $ldate && Carbon::parse($news->date_end)->format('Y-m-d') >= $ldate) {--}}
{{--                       $newsImageList = \App\Models\NewsImage::query()->where('news_id','=',$news->slug)->orderByDesc('id')->limit(3)->get();--}}
{{--                    }--}}
{{--                @endphp--}}
{{--                @foreach($newsImageList as $newsImage)--}}
{{--                  @if($newsImageList->count()<2)--}}
{{--                    <div class="col-lg-4 col-md-6 mb-4">--}}
{{--                      <div class="latest-post">--}}
{{--                        <div class="latest-post-media">--}}
{{--                          <a href="" class="latest-post-img">--}}
{{--                            <img loading="lazy" class="img-fluid" src="{{ url('home/sra_website/'.$newsImage->path) }}" alt="img">--}}
{{--                          </a>--}}
{{--                        </div>--}}
{{--                        <div class="post-body">--}}
{{--                          <h4 class="post-title">--}}
{{--                            <a class="btn" onclick="viewNews('{!!$news->id!!}')" class="d-inline-block">{!!$news->title!!}</a>--}}
{{--                          </h4>--}}
{{--                          <div class="latest-post-meta">--}}
{{--                      <span class="post-item-date">--}}
{{--                        <i class="fa fa-clock-o"></i> {{Carbon::parse($news->date)->format('M|j|Y')}}--}}
{{--                      </span>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div><!-- Latest post end -->--}}
{{--                    </div><!-- 1st post col end -->--}}
{{--                  @endif--}}
{{--                @endforeach--}}
{{--              @endforeach--}}
{{--            @endif--}}
            <div class="general-btn text-center mt-4">
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="row text-center">
            <div class="col-12">
              <h3 class="section-sub-title">Vacant Positions</h3>
            </div>
          </div>
          <div class="row">
            @php
            $vacant_position = \App\Models\VacantPosition::query()->orderByDesc('date')->limit(3)->get();
            @endphp

            @foreach($vacant_position as $vacantPosition)

            <div class="col-4">
              <div class="latest-post">
                <div class="latest-post-media">
                  <a class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="{{ url('constra/images/SRA/SRA_DA logo.png') }}" alt="img">
                  </a>
                </div>
                <div class="post-body" style="">
                  <h4 class="post-title">
                    <a class="d-inline-block" target="_blank" href="/home/sra_website/{!!$vacantPosition->path!!}"> AS OF {{Carbon::parse($vacantPosition->date)->format('F j, Y')}}</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
{{--                        <i class="fa fa-clock-o"></i> {{Carbon::parse($vacantPosition->date)->format('F j, Y')}}--}}
                      </span>
                  </div>
                </div>
              </div><!-- Latest post end -->
            </div><!-- 1st post col end -->
            @endforeach
            <div class="general-btn text-center mt-4 ml-3">
              <a class="btn btn-primary" href="/industryUpdate/vacantPosition">See All Vacant Positions</a>
            </div>
          </div>
        </div>
        <!--/ Content row end -->
      </div>
    </div>
    <!--/ Container end -->
  </section>
  <!--/ News end -->

  <section id="facts" class="facts-area dark-bg">
    <div class="container">
      <div class="facts-wrapper">
        <div class="row">
          <!-- Col end -->

        </div> <!-- Facts end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Facts end -->

  <section id="ts-service-area" class="ts-service-area pb-0 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="row text-center">
            <div class="col-12">
              <h5 class="service-box-title"><a href="#">The Administrator's Portal</a></h5>
              <h3 class="section-sub-title">Acting Administrator and CEO</h3>
              <img width="450px" height="600px" style="margin-top: -10%; border: 5px solid green" loading="lazy" class="img-fluid" src="{{asset('constra/images/SRA/PABLO LUIS S. AZCONA.jpg')}}" alt="admin-image">
              <h5 class="mb-5 mt-3 text-uppercase" style="margin-top: -10%">HON. Pablo Luis S. Azcona</h5>
            </div>
          </div>
        </div>

        <div class="col-6">
          <h3 class="column-title">We love to hear from you</h3>
          <!-- contact form works with formspree.io  -->
          <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
          <form id="contact-us-form" name="contact-us-form" method="post" role="form">
            @csrf
            <div class="error-container"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                         required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Subject</label>
                  <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
                        required></textarea>
            </div>
            <div class="text-right"><br>
              <button class="btn btn-primary solid blank" type="submit">Send Message</button>
            </div>
          </form>
        </div>
      </div>
      <!--/ Title row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Service end -->

@include('layouts.constra-footer')

@include('layouts.constra-js-plugins')

@yield('scripts')

  <script type="text/javascript">
    $(function () {
      $('form#contact-us-form').on('submit', function (event) {
        $.ajax({
          type: 'post',
          url: "{{route('contactUsStore')}}",
          data: $('form').serialize(),
          success: function (response) {
            $('form').trigger("reset");
            Swal.fire({
              title: 'Success!',
              text: 'Thank you for contacting us. We will get back to you as soon as possible.',
              icon: 'success',
              confirmButtonText: 'Done'
            })
          },
          error: function(response){
            alert(response.responseJSON.errors);
            console.log(response);
            errored(form,response);
          }
        });
        event.preventDefault();
      });
    });

    function viewNav(routE){
      window.open("{{route('navRoute')}}".replace('navRoute', routE),'_blank').focus();
    }

    function viewNews(id){
      window.open("{{route('newsRoute', 'ID')}}".replace('ID', id),'_blank').focus();
    }
  </script>
</div><!-- Body inner end -->
</body>

</html>
