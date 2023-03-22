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
    <h1>Create Sugarcane Varieties</h1>
</section>

<section class="content">
            
    <div class="box">
        
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form id="sugarcaneVarietiesForm" method="POST" autocomplete="off" enctype="multipart/form-data">

        <div class="box-body">
            @csrf
                {!! __form::file(
              '8', 'img_url[]', 'Upload Image *', $errors->has('img_url'), $errors->first('img_url'), 'required'
              ) !!}
                {!! __form::textbox(
                '6', 'name', 'text', 'Name *', 'Name', old('name'), $errors->has('name'), $errors->first('name'), 'required'
              ) !!}
                {!! __form::textbox(
                '6', 'description', 'text', 'Description *', 'Description', old('description'), $errors->has('description'), $errors->first('description'), 'required'
              ) !!}
                {!! __form::textbox(
                  '6', 'habit_of_growth', 'text', 'Habit of Growth *', 'Habit of Growth', old('habit_of_growth'), $errors->has('habit_of_growth'), $errors->first('habit_of_growth'), 'required'
                ) !!}
                {!! __form::textbox(
                  '6', 'flowering', 'text', 'Flowering *', 'Flowering', old('flowering'), $errors->has('flowering'), $errors->first('flowering'), 'required'
                ) !!}
                {!! __form::textarea(
                      '6 leaf_characteristics', 'leaf_characteristics', 'Leaf Characteristics *', '', $errors->has('remarks'), $errors->first('remarks'), '',''
                ) !!}

                {!! __form::textarea(
                        '6 stalk_characteristics', 'stalk_characteristics', 'Stalk Characteristics *', '', $errors->has('stalk_characteristics'), $errors->first('stalk_characteristics'), '',''
                  ) !!}

                {!! __form::textarea(
                        '6 yield_potential', 'yield_potential', 'Yield Potential *', '', $errors->has('yield_potential'), $errors->first('yield_potential'), '',''
                  ) !!}
                {!! __form::textarea(
                        '6 reaction_to_disease', 'reaction_to_disease', 'Reaction to Diseases *', '', $errors->has('reaction_to_disease'), $errors->first('reaction_to_disease'), '',''
                  ) !!}

                {!! __form::textarea(
                      '12 remarks', 'remarks', 'Remarks/Recommendation *', '', $errors->has('remarks'), $errors->first('remarks'), '',' Please input your remarks/recommendation.'
                ) !!}
        </div>

        <div class="box-footer">
          <button id="btnSugarcaneVarietiesFormSubmit" type="submit" class="btn btn-default">Save</button>
        </div>

      </form>

    </div>

</section>

@endsection





@section('modals')

@endsection 






@section('scripts')

  <script type="text/javascript">

    $("#sugarcaneVarietiesForm").submit(function (e) {
      e.preventDefault();
      let form = $(this);
      let formData = new FormData(this);
      loading_btn(form);
      $.ajax({
        url: "{{ route('dashboard.sugarcaneVarieties.store') }}",
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        headers: {
          {!! __html::token_header() !!}
        },
        success: function (res) {
          $('form').trigger("reset");
          $('#btnSugarcaneVarietiesFormSubmit').removeAttr("disabled");
          Swal.fire({
            title: 'Success!',
            text: 'Sugarcane Variety successfully created!',
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


    const textarea = document.getElementById("editor");

    textarea.addEventListener("input", function (e) {
      this.style.height = "auto";
      this.style.height = this.scrollHeight + "px";
    });

  </script>
    
@endsection