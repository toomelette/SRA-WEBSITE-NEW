@extends('layouts.admin-master')

@section('content')

{{--    <section class="content-header">--}}
{{--        <h1>Manage Users</h1>--}}
{{--    </section>--}}

    <section class="content">
        <div class="login-box">
            <div class="login-box-body">
                <p class="login-box-msg">Please select Year and Department</p>

                <form action="{{route('dashboard.budget_proposal.index')}}" method="GET">
                    <div class="row">
                        {!! __form::select_year(12, 'Year', 'fiscal_year', [] , '', '') !!}

                        {!!
                            __form::select_static2(12, 'resp_center', 'Responsibility Center: ','',
                            \App\Swep\Helpers\Helper::responsibilityCenters()
                            , '', '', '', '')
                           !!}
                        <div class="col-md-12">
                            <button class="btn btn-success pull-right" type="submit">Proceed</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.login-box-body -->
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


@endsection