@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Notice Of Proceed</h1>
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
                <div id="NoticeProceed_table_container" style="">
                    <table class="table table-bordered table-striped table-hover" id="NoticeProceed_table" style="width: 100% !important">
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
            notice_proceed_tbl = $("#NoticeProceed_table").DataTable({
                'dom' : 'lBfrtip',
                "processing": true,
                "serverSide": true,
                "ajax" : '{{ route("dashboard.noticeProceed.index") }}',
                "columns": [
                    { "data": "crop_year" },
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
                        $("#NoticeProceed_table_container").fadeIn();
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
                        $("#NoticeProceed_table #"+active).addClass('success');
                    }
                }
            })

            style_datatable("#NoticeProceed_table");

            //Need to press enter to search
            $('#NoticeProceed_table_filter input').unbind();
            $('#NoticeProceed_table_filter input').bind('keyup', function (e) {
                if (e.keyCode == 13) {
                    notice_proceed_tbl.search(this.value).draw();
                }
            });
        });

    </script>


@endsection