<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Power Cogeneration | SRA</title>

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
              <h1 class="banner-title">Power Cogeneration</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">Business Opportunities</li>
                  <li class="breadcrumb-item active" aria-current="page">How to be a Power Cogeneration?</li>
                </ol>
              </nav>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container mb-lg-5 mt-lg-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div id="page-slider" class="page-slider small-bg">
            <div class="item" style="background-image:url({{asset('constra/images/SRA/About-Us-SRA-Bldg.jpg')}}">
              <div class="container">
                <div class="box-slider-content">
                  <div class="box-slider-text">
                    <h2 class="box-slide-title"></h2>
                  </div>
                </div>
              </div>
            </div><!-- Item 1 end -->
          </div><!-- Page slider end-->
        </div><!-- Col end -->
        <div class="col-lg-6">
          <h4 class="column-title">How to be a Power Cogeneration?</h4>
          <span>(only for biomass from sugarcane)</span>
          <p><strong>Please completely fill up the form below:</strong></p>
          <form id="powerCogenerationForm" name="powerCogenerationForm" method="post" role="form">
            @csrf
            <div class="error-container"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Business Name</label>
                  <input class="form-control form-control-name" name="business_name" id="business_name" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Business Address</label>
                  <input class="form-control form-control-name" name="business_address" id="business_address" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Plansite Location</label>
                  <input class="form-control form-control-name" name="plantsite_location" id="plantsite_location" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Contact Person</label>
                  <input class="form-control form-control-name" name="contact_person" id="contact_person" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Contact Number</label>
                  <input class="form-control form-control-name" name="contact_number" id="contact_number" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                         required>
                </div>
              </div>
            </div>
            <div class="text-right"><br>
              <button class="btn btn-primary solid blank" type="submit">Done</button>
            </div>
          </form>
        </div><!-- Col end -->


      </div><!-- Content row end -->
    </div><!-- Container end -->
  </section><!-- Main container end -->

  @include('layouts.constra-footer')

@include('layouts.constra-js-plugins')
@yield('scripts')
  <script type="text/javascript">
    $(function () {
      $('form#powerCogenerationForm').on('submit', function (event) {
        $.ajax({
          type: 'post',
          url: "{{route('powerCogenerationStore')}}",
          data: $('form').serialize(),
          success: function (response) {
            $('form').trigger("reset");
            Swal.fire({
              title: 'Success!',
              text: 'Registration Complete. We will get back to you as soon as possible.',
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
  </script>

</div><!-- Body inner end -->
</body>

</html>
