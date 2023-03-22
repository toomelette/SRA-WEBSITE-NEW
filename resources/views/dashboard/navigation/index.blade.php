@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Manage Website Navigation</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List of Navigations</h3>
                <div class="pull-right">
                    <div class="btn-group">
                        <button class="btn btn-default change_menu_btn" data-toggle="modal" data-target="#change_navigation_modal">
                            <i class="fa fa-sort-amount-asc"></i>
                            Change Navigation Order</button>
                        <button type="button" class="btn bg-green" data-toggle="modal" data-target="#add_menu_modal"><i class="fa fa-plus"></i> Add new</button>
                    </div>
                </div>
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
                                <label>Is menu:</label>
                                <select name="scholars_table_length" aria-controls="scholars_table" class="form-control input-sm filter_menu filters">
                                    <option value="">All</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-1 col-sm-2 col-lg-2">
                                <label>Is dropdown:</label>
                                <select name="scholars_table_length" aria-controls="scholars_table" class="form-control input-sm filter_dropdown filters">
                                    <option value="">All</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="navigation_table" style="width: 100% !important; font-size: 14px">
                            <thead>
                                <tr class="">
                                    <th width="40%">Name</th>
                                    <th width="20%">Name</th>
                                    <th width="10%">Main</th>
                                    <th width="10%">Active</th>
                                    <th width="10%">Sequence</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('modals')
    {!! __html::blank_modal('edit_navigation_modal','sm') !!}

    {!! __html::blank_modal('list_subnavs','lg') !!}
@endsection

@section('scripts')
    <script type="text/javascript">

        navigation_tbl = $("#navigation_table").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax" : '{{ route("dashboard.navigation.index") }}',
            "pageLength" : 5,
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
            "columns": [
                { "data": "name" },
                { "data": "route" },
                { "data": "is_main" },
                { "data": "is_active" },
                { "data": "sequence" },
                { "data": "action" },
            ],
            "order": [[ 0, "asc" ]],
            "columnDefs":[
                {
                    "className":"action_column",
                    "targets" : [3],
                },
                {
                    "visible" : true,
                    "targets": [0],
                }
            ],

            "initComplete": function (settings,json) {
                console.log("#"+settings.sTableId+"_container");
                $("#loading").fadeOut(function () {
                    $("#"+settings.sTableId+"_container").fadeIn();
                });

            }
        });

        $('#navigation_table_filter input[type="search"]').unbind();
        $('#navigation_table_filter input[type="search"]').bind('keyup', function (e) {
            if (e.keyCode == 13) {
                navigation_tbl.search(this.value).draw();
            }
        });

        $(".select_filter").change(function(){
            var is_active = $(".select_filter[name='is_active']").val();
            var is_main = $(".select_filter[name='is_main']").val();
            navigation_tbl.ajax.url('{{ route("dashboard.navigation.index") }}?is_active='+is_active+'&is_main='+is_main).load();

            $(".select_filter").each(function(){
                if($(this).val() != 'All'){
                    $(this).addClass('border-info');
                }else{
                    $(this).removeClass('border-info');
                }
            })
        })

        $("body").on("click",".list_subnavs_btn", function(){
            var id = $(this).attr('data');
            var navigation_id = $(this).attr('data');
            $("#list_subnavs .modal-content").html(modal_loader);
            $.ajax({
                url : "{{ route('dashboard.subnav.index') }}",
                data: {slug : id, navigation_id: navigation_id},
                type: "GET",
                success: function(response){
                    $("#list_subnavs #modal_loader").fadeOut(function() {
                        $("#list_subnavs .modal-content").html(response);

                    });
                },
                error: function(response){
                }
            })
        });

        $("body").on("click",".edit_navigation_btn", function(){
            var btn = $(this);
            var slug = btn.attr("data");
            load_modal2(btn);
            uri = "{{ route('dashboard.navigation.edit','slug') }}";
            uri = uri.replace('slug',slug);
            $.ajax({
                url : uri,
                type: 'GET',
                success: function(response){
                    populate_modal2(btn, response);
                },
                error: function(response){

                }
            });
        });

        ("body").on("submit","#edit_navigation_form", function(e){
            e.preventDefault();
            id = $(this).attr("data");
            wait_button("#edit_navigation_form");
            uri = "{{ route('dashboard.navigation.update','slug') }}";
            uri = uri.replace("slug",id);

            $.ajax({
                url : uri,
                data: $(this).serialize(),
                type: 'PUT',
                success: function(response){
                    succeed("#edit_navigation_form","save",false);
                    active = response.slug;
                    menu_tbl.draw(false);
                    $("#edit_navigation_modal").modal("hide");
                },
                error: function(response){
                    console.log(response);
                    errored("#edit_navigation_form","save",response);
                }
            })
        });



        function printIframe(){
            $("#printIframe").get(0).contentWindow.print();
        }

    </script>
@endsection
