@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Manage Directory of Sugar Refineries</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
            </div>

            <div class="panel">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#advanced_filters" aria-expanded="true" class="">
                            <i class="fa fa-filter"></i>  Advanced Filters <i class=" fa  fa-angle-down"></i>
                        </a>
                    </h4>
                    <button type="button" class="btn btn-primary pull-right fa fa-plus-circle" data-toggle="modal" data-target="#myModal">
                        Add Sugar Trader
                    </button>
                </div>
                <div id="advanced_filters" class="panel-collapse collapse" aria-expanded="true" style="">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-1 col-sm-2 col-lg-2">
                                <label>Status:</label>
                                <select name="status" aria-controls="scholars_table" class="form-control input-sm filter_status filters">
                                    <option value="">All</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>
                            <div class="col-md-1 col-sm-2 col-lg-2">
                                <label>Account Status:</label>
                                <select name="account" aria-controls="scholars_table" class="form-control input-sm filter_account filters">
                                    <option value="">All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div id="block_farm_table_container" style="">
                    <table class="table table-bordered table-striped table-hover" id="block_farm_table" style="width: 100% !important">
                        <thead>
                        <tr class="">
                            <th width="10%" class="">Crop Year</th>
                            <th width="10%" class="">Date</th>
                            <th width="20%" class="">File Title</th>
                            <th width="35%" class="">Title</th>
                            <th width="25%" class="">Path</th>
                            <th width="10%" class="action">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div id="tbl_loader">
                    <center>
                        <img style="width: 100px" src="{{asset('images/loader.gif')}}">
                    </center>
                </div>

            </div>
        </div>

    </section>

@endsection


@section('modals')
    {{--Modal sample--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Directory of Sugar Refineries</h4>
                </div>
                <div class="modal-body">

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Form</h3>
                            <div class="pull-right">
                                <code>Fields with asterisks(*) are required</code>
                            </div>
                        </div>
                        @csrf
                        <form id="roadMapForm" method="POST" autocomplete="off" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="col-md-12">

                                    {!! __form::select_static2(
                                    '8 year', 'year', 'Crop Year: *', '', \App\Swep\Helpers\Helper::crop_year_stakeholders(), '', '', '', 'required'
                                    ) !!}
                                    {!! __form::textbox(
                                      '4', 'date', 'date', 'Date *', '', old('date'), $errors->has('date'), $errors->first('date'), 'required'
                                    ) !!}

                                    {!! __form::file(
                                     '8', 'img_url[]', 'Upload PDF *', $errors->has('img_url'), $errors->first('img_url'), 'required'
                                    ) !!}

                                    {!! __form::textbox(
                                      '12', 'file_title', 'text', 'File Title *', '', old('file_title'), $errors->has('file_title'), $errors->first('file_title'), 'required'
                                    ) !!}

                                    {!! __form::textbox(
                                      '12', 'title', 'text', 'Title *', '', old('title'), $errors->has('title'), $errors->first('title'), 'required'
                                    ) !!}

                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnroadMapSubmit" class="btn btn-primary">Save changes</button></form>
                </div>
            </div>
        </div>
    </div>
    {{--End of Modal--}}
@endsection

@section('scripts')
    <script type="text/javascript">
        function dt_draw() {
            users_table.draw(false);
        }

        function filter_dt() {
            is_online = $(".filter_status").val();
            is_active = $(".filter_account").val();
            users_table.ajax.url("{{ route('dashboard.user.index') }}" + "?is_online=" + is_online + "&is_active=" + is_active).load();

            $(".filters").each(function (index, el) {
                if ($(this).val() != '') {
                    $(this).parent("div").addClass('has-success');
                    $(this).siblings('label').addClass('text-green');
                } else {
                    $(this).parent("div").removeClass('has-success');
                    $(this).siblings('label').removeClass('text-green');
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            //-----DATATABLES-----//
            //Initialize DataTable
            modal_loader = $("#modal_loader").parent('div').html();
            active = '';
            stk_directory_sugar_refineries_tbl = $("#block_farm_table").DataTable({
                'dom' : 'lBfrtip',
                "processing": true,
                "serverSide": true,
                "ajax" : '{{ route("dashboard.stkDirectorySugarRefineries.index") }}',
                "columns": [
                    { "data": "year" },
                    { "data": "date"},
                    { "data": "file_title" },
                    { "data": "title" },
                    { "data": "path" },
                    { "data": "action" }
                ],
                "buttons": [
                    {!! __js::dt_buttons() !!}
                ],
                "columnDefs":[
                    {
                        "targets" : 0,
                    },
                    {
                        "targets" : 1,
                        "orderable" : false,
                    },
                ],
                "responsive": false,
                "initComplete": function( settings, json ) {
                    $('#tbl_loader').fadeOut(function(){
                        $("#block_farm_table_container").fadeIn();
                    });
                },
                "language":
                    {
                        "processing": "<center><img style='width: 70px' src='{{asset("images/loader.gif")}}'></center>",
                    },
                "drawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();
                    $('[data-toggle="modal"]').tooltip();
                    if(active != ''){
                        $("#block_block_table #"+active).addClass('success');
                    }
                }
            })

            style_datatable("#block_farm_table");

            //Need to press enter to search
            $('#block_farm_table_filter input').unbind();
            $('#block_farm_table_filter input').bind('keyup', function (e) {
                if (e.keyCode == 13) {
                    stk_directory_sugar_refineries_tbl.search(this.value).draw();
                }
            });
        });

        $("#roadMapForm").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(this);
            loading_btn(form);
            $.ajax({
                url: "{{route('dashboard.stkDirectorySugarRefineries.store')}}",
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    $('form').trigger("reset");
                    $('#btnroadMapSubmit').removeAttr("disabled");
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your New Directory successfully added to Directory of Sugar Refineries!',
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