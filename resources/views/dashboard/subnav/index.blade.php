@extends('layouts.modal-content')

@section('modal-header')
    <b><i class="fa fa-times"></i> {{ $navigation->name }}
@endsection

@section('modal-body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <div class="row">
                    <form id="add_subnav_form" data="{{ $navigation->slug}}" autocomplete="off">
                        @csrf
                        <p class="page-header-sm text-center">Add subnav to {{ $navigation->name }} </p>
                        {!! __form::textbox(
                            '4 name', 'name', 'text', 'Name: *', 'Name','', '', '', ''
                        ) !!}

                        {!! __form::select_static(
                            '2 is_active', 'is_active', 'Is Active: *', '', [
                            'No' => '0',
                            'Yes' => '1',
                            ], '', '', '', ''
                        ) !!}

                        {!! __form::textbox(
                            '4 sequence', 'sequence', 'text', 'Sequence: *', $navigation->sequence.'.example','', '', '', ''
                        ) !!}

                        <div class="col-md-12">
                            <button type="submit" class="btn bg-green pull-right">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <center>
        <label>{{ $navigation->name }} Sub Navigations</label>
    </center>
    <div class="row" id="subnav_table_container" hidden>
        <div class="col-md-12">
            <table class="table table-striped table-bordered" id="subnav_table" style="width: 100% !important">
                <thead>
                <tr class="bg-green">
                    <th>Name</th>
                    <th>Active</th>
                    <th>Sequence</th>
                    <th style="width: 70px !important">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div id="tbl_loader_subnav">
        <center>
            <img style="width: 100px" src="{{asset("images/loader.gif")}}">
        </center>
    </div>
@endsection

@section('modal-footer')

@endsection

@section('scripts')
    <script>
        $(".edit_subnav_btn").click(function () {
            btn = $(this);
            var slug = btn.attr('data');
            uri = "{{route('dashboard.subnav.edit','slug')}}";
            uri = uri.replace('slug',slug);
            load_modal2(btn);
            $.ajax({
                url: uri,
                type: 'GET',
                success: function (res) {
                    populate_modal2(btn,res);
                },
                error: function (res) {
                    notify('Error','warning');
                    console.log(res);
                }
            })
        });

        $("#add_subnav_form").submit(function (e) {
            e.preventDefault();
            form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.subnav.store")}}',
                data : form.serialize()+"&navigation_id={{$navigation->slug}}",
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form, true, false);
                    subnav_navigation_tbl.draw(false);
                    subnav_tbl_active = res.slug;
                },
                error: function (res) {
                    errored(form,res);
                    console.log(res);
                }
            })
        });

        // $("body").on("click",'.edit_submenu_btn',function () {
        //     alert();
        // });
        function edit_subnav_modal(slug){
            btn = $(".edit_subnav_btn[data='"+slug+"']");
            load_modal2(btn);
            var uri = "{{route('dashboard.subnav.edit','slug')}}";
            var uri = uri.replace('slug',slug);
            $.ajax({
                url : uri,
                type: 'GET',
                success: function (res) {
                   populate_modal2(btn,res);
                },
                error: function (res) {
                    console.log(res);
                }
            })
        }



        $(document).ready(function () {

            subnav_tbl_active = '';
            //Initialize DataTable
            subnav_navigation_tbl = $("#submenu_table").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax" : '{{ route("dashboard.subnav.fetch") }}?navigation_id={{$navigation->slug}}',
                "columns": [
                    { "data": "name" },
                    { "data": "is_active" },
                    { "data": "sequence" },
                    { "data": "action" }
                ],
                // buttons: [
                //     'copy', 'excel', 'pdf'
                // ],
                "columnDefs":[
                    {
                        "targets" : 0,
                        "class" : 'w-30p'
                    },
                    {
                        "targets" : 4,
                        "orderable" : false,
                        "class" : 'action-60'
                    },
                    {
                        "targets" : 2,
                        "class" : 'w-15p'
                    },
                    {
                        "targets" : 3,
                        "class" : 'text-center'
                    },
                ],
                "order" : [[0, 'asc']],
                "responsive": false,
                "initComplete": function( settings, json ) {
                    $('#tbl_loader_subnav').fadeOut(function(){
                        $("#subnav_table_container").fadeIn();
                    });
                },
                "language":
                    {
                        "processing": "<center><img style='width: 70px' src='{{asset('images/loader.gif')}}'></center>",
                    },
                "drawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();
                    $('[data-toggle="modal"]').tooltip();
                    if(subnav_tbl_active != ''){
                        $("#subnav_table #"+subnav_tbl_active).addClass('success');
                    }
                }
            })
        })

    </script>
@endsection

