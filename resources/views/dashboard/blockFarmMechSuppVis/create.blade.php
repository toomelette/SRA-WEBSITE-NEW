@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Add Farm Mechanization Support</h1>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Form</h3>
                <div class="pull-right">
                    <code>Fields with asterisks(*) are required</code>
                </div>
            </div>
            @csrf
            <form id="blockfarmForm" method="POST" autocomplete="off" enctype="multipart/form-data">

                <div class="box-body">

                    <div class="col-md-11">

                        {!! __form::select_static2(
                       '8 year', 'year', 'Year: *', '', \App\Swep\Helpers\Helper::year(), '', '', '', 'required'
                       ) !!}
                        {!! __form::textbox(
                          '4', 'date', 'date', 'Date *', '', old('date'), $errors->has('date'), $errors->first('date'), 'required'
                        ) !!}

                        {!! __form::file(
                         '4', 'img_url[]', 'Upload PDF *', $errors->has('img_url'), $errors->first('img_url'), 'required'
                        ) !!}

                        {!! __form::textbox(
                          '8', 'file_title', 'text', 'File Title *', 'File Title', old('file_title'), $errors->has('file_title'), $errors->first('file_title'), 'required'
                        ) !!}

                        {!! __form::textbox(
                          '8', 'title', 'text', 'Title *', '', old('title'), $errors->has('title'), $errors->first('title'), 'required'
                        ) !!}

                    </div>
                </div>

                <div class="box-footer">
                    <button id="btnBlockFarmSubmit" type="submit" class="btn btn-default">Save</button>
                </div>

            </form>

        </div>

    </section>

@endsection

@section('scripts')

    <script type="text/javascript">
        $("#blockfarmForm").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(this);
            loading_btn(form);
            $.ajax({
                url: "{{route('dashboard.blockFarmMechSuppVis.store')}}",
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    $('form').trigger("reset");
                    $('#btnBlockFarmSubmit').removeAttr("disabled");
                    Swal.fire({
                        title: 'Success!',
                        text: 'New Farm Mechanization Support (Visayas) successfully added!',
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
            allowedFileExtensions: ["pdf", "jpeg", "jpg", "png", "txt"],
            maxFileCount: 1,
            showUpload: false,
            showCaption: false,
            overwriteInitial: true,
            fileType: "pdf",
            browseClass: "btn btn-primary btn-md",
        });
        $(".kv-file-remove").hide();
    </script>

@endsection