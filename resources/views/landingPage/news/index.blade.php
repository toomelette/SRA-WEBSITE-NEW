<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>News | SRA</title>

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

    @php

    @endphp
  <div id="banner-area" class="banner-area" style="background-image:url({{asset('constra/images/slider-main/bg2_new.jpg')}})">
    <div class="banner-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="banner-heading">
              <h1 class="banner-title">News</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">News</li>
                  <li class="breadcrumb-item active" aria-current="page">{!! $news->title !!}</li>
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
          <div class="col-lg-8 mb-5 mb-lg-0">

              <div class="post-content post-single">
                  <div class="post-media post-image">
                      <img width="70%" loading="lazy" src="{{ url('home/sra_website/'.$newsImage->path) }}" class="img-fluid" alt="post-image">
                  </div>

                  <div class="post-body">
                      <div class="entry-header">
                          <div class="post-meta">
                                <span class="post-author">
                                  <i class="far fa-user"></i><a href="#"> Admin</a>
                                </span>
                                <span class="post-cat">
                                    <i class="far fa-folder-open"></i><a> News</a>
                                </span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i> {{Carbon::parse($news->date)->format('m|d|Y')}}</span>
{{--                                <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span>--}}
                          </div>
                          <h2 class="entry-title">
                              {!! $news->title !!}
                          </h2>
                      </div><!-- header end -->

                      <div class="entry-content">
                          <p>{!! $news->description !!}</p>

                          <blockquote>
                              <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.<cite>-
                                      Anger Mathe</cite></p>
                          </blockquote>

                      </div>
                  </div><!-- post-body end -->
              </div><!-- post content end -->
          </div><!-- Content Col end -->
          <div class="col-lg-4">

              <div class="sidebar sidebar-right">
                  <div class="widget recent-posts">
                      <h3 class="widget-title">More News</h3>
                      <ul class="list-unstyled">
                          @php
                            $newsList = \App\Models\News::query()->get();
                            $newsImageList = \App\Models\NewsImage::query()->get();
                            $newsImagePath = "";
                          @endphp
                          @foreach($newsList as $newsOnList)
                              @foreach($newsImageList as $newsImageOnList)
                                  @php
                                    if($newsImageOnList->news_id = $newsOnList->slug)
                                        $newsImagePath = $newsImageOnList->path;
                                  @endphp
                              @endforeach
                              <li class="d-flex align-items-center">
                                  <div class="posts-thumb">
                                      <a href="#"><img loading="lazy" alt="img" src="{{ url('home/sra_website/'.$newsImagePath) }}"></a>
                                  </div>
                                  <div class="post-info">
                                      <h4 class="entry-title">
                                          <a href="#">{!! $newsOnList->title !!}</a>
                                      </h4>
                                  </div>
                              </li><!-- 1st post end-->
                          @endforeach
                      </ul>
                  </div><!-- Recent post end -->

              </div><!-- Sidebar end -->
          </div><!-- Sidebar Col end -->

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

    function viewNews(id){
      window.open("{{route('newsRoute', 'ID')}}".replace('ID', id)).focus();
    }
  </script>

</div><!-- Body inner end -->
</body>

</html>
