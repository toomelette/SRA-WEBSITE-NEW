@extends('layouts.modal-content', ['form_id'=> 'edit_navigation_form', 'slug'=>$navigation->slug])

@section('modal-header')
    <i class="fa fa-times"></i> {{$navigation->name}}
@endsection

@section('modal-body')
    <div class="row">
        {!! __form::textbox(
          '12 name', 'name', 'text', 'Name: *', 'Name',$navigation->name, '', '', ''
        ) !!}

        {!! __form::textbox(
          '12 route', 'route', 'text', 'Route: *', 'Route',$navigation->route, '', '', ''
        ) !!}

        {!! __form::select_static(
          '6 is_main', 'is_main', 'Is Main: *',$navigation->is_main, [
            'No' => '0',
            'Yes' => '1',
          ], '', '', '', ''
        ) !!}

        {!! __form::select_static(
         '6 is_active', 'is_active', 'Is Active: *',$navigation->is_active, [
           'No' => '0',
           'Yes' => '1',
         ], '', '', '', ''
       ) !!}

        {!! __form::textbox(
           '12 sequence', 'sequence', 'text', 'Sequence: *', 'Sequence',$navigation->sequence, '', '', ''
         ) !!}
    </div>
@endsection

@section('modal-footer')
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script>
        $("#edit_navigation_form").submit(function (e) {
            e.preventDefault();
            form = $(this);
            var slug = form.attr('data');
            var uri = "{{route('dashboard.navigation.update','slug')}}";
            uri = uri.replace('slug',slug);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'PATCH',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,false,true);
                    active = res.slug;
                    navigation_tbl.draw(false);
                    notify('Data change success','success');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
    </script>
@endsection

