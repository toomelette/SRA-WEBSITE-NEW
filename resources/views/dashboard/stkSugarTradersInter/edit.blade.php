@extends('layouts.modal-content', ['form_id'=> 'edit_roadMap_form', 'slug'=>$roadMap->slug])

@section('modal-header')
    <i class="fa fa-times"></i> {{$roadMap->name}}
@endsection

@section('modal-body')
    <div class="row">
        {!! __form::textbox(
          '12 name', 'name', 'text', 'Name: *', 'Name',$roadMap->name, '', '', ''
        ) !!}


        {!! __form::textbox(
          '12 route', 'route', 'text', 'Route: *', 'Route',$roadMap->route, '', '', ''
        ) !!}

        {!! __form::textbox(
          '12 category', 'category', 'text', 'Category: *', 'Category',$roadMap->category, '', '', ''
        ) !!}

        {!! __form::textbox_icon(
          '12 icon', 'icon', 'text', 'Icon: *', 'Icon',$roadMap->icon, '', '', ''
        ) !!}

        {!! __form::select_static(
          '6 is_menu', 'is_menu', 'Is menu: *', $roadMap->is_menu, [
            'No' => '0',
            'Yes' => '1',
          ], '', '', '', ''
        ) !!}

        {!! __form::select_static(
          '6 is_dropdown', 'is_dropdown', 'Is dropdown: *',$roadMap->is_dropdown, [
            'No' => '0',
            'Yes' => '1',
          ], '', '', '', ''
        ) !!}
    </div>
@endsection

@section('modal-footer')
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script>
        $("#edit_roadMap_form").submit(function (e) {
            e.preventDefault();
            form = $(this);
            var slug = form.attr('data');
            var uri = "{{route('dashboard.roadMap.update','slug')}}";
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
                    menu_tbl.draw(false);
                    notify('Data change success','success');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
    </script>
@endsection

