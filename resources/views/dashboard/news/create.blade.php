@extends('layouts.admin-master')

@section('content')
  <style>
    textarea {
      border-radius: 5px;
      background: #121212;
      color: #e2e2e2;
      border: none;
      display: block;
      width: 100%;
      resize: none;
      line-height: 1.4;
      overflow: hidden;
      height: auto;
      padding: 8px;
      font-size: 18px;
      outline: none;
    }
  </style>
<section class="content-header">
    <h1>Create News</h1>
</section>

<section class="content">
            
    <div class="box">
        
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form id="newsForm" method="POST" autocomplete="off" enctype="multipart/form-data">

        <div class="box-body">
          <div class="col-12">

            @csrf
              {!! __form::textbox(
              '12', 'title', 'text', 'Title *', 'Title', old('title'), $errors->has('title'), $errors->first('title'), 'required'
            ) !!}
              {!! __form::datepicker(
                  '4', 'date',  'Date *', old('date') ? old('date') : Carbon::now()->format('Y-m-d'), $errors->has('date'), $errors->first('date')
              ) !!}

              {!! __form::datepicker(
              '4', 'date_start',  'Date Start*', old('date_start') ? old('date_start') : Carbon::now()->format('Y-m-d'), $errors->has('date_start'), $errors->first('date_start')
                ) !!}

              {!! __form::datepicker(
              '4', 'date_end',  'Date End*', old('date_end') ? old('date_end') : Carbon::now()->format('Y-m-d'), $errors->has('date_end'), $errors->first('date_end')
                ) !!}

            {!! __form::file(
             '6', 'img_url[]', 'Upload Image *', $errors->has('img_url'), $errors->first('img_url'), 'required'
             ) !!}

              {!! __form::textarea(
                    '6 description', 'description', 'Content *', '', $errors->has('description'), $errors->first('description'), '',' Please input here the news content.'
              ) !!}
          </div>

        </div>

        <div class="box-footer">
          <button id="btnNewsFormSubmit" type="submit" class="btn btn-default">Save</button>
        </div>

      </form>

    </div>

</section>

@endsection





@section('modals')

@endsection 






@section('scripts')

  <script type="text/javascript">

    $("#newsForm").submit(function (e) {
      e.preventDefault();
      let form = $(this);
      let formData = new FormData(this);
      loading_btn(form);
      $.ajax({
        url: "{{ route('dashboard.news.store') }}",
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        headers: {
          {!! __html::token_header() !!}
        },
        success: function (res) {
          $('form').trigger("reset");
          $('#btnNewsFormSubmit').removeAttr("disabled");
          Swal.fire({
            title: 'Success!',
            text: 'News successfully created!',
            icon: 'success',
            confirmButtonText: 'Done'
          })
        },
        error: function (res) {
          errored(form,res)
        }
      })
    })


    $("#img_url").fileinput({
      theme: "fa",
      allowedFileExtensions: ["pdf", "jpeg", "jpg", "png"],
      maxFileCount: 1,
      showUpload: false,
      showCaption: false,
      overwriteInitial: true,
      fileType: "pdf",
      browseClass: "btn btn-primary btn-md",
    });
    $(".kv-file-remove").hide();


    // const textarea = document.getElementById("editor");
    //
    // textarea.addEventListener("input", function (e) {
    //   this.style.height = "auto";
    //   this.style.height = this.scrollHeight + "px";
    // });

  </script>
    
@endsection