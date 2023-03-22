@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>Create Navigation</h1>
</section>

<section class="content">
            
    <div class="box">
        
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form method="POST" autocomplete="off" action="{{ route('dashboard.navigation.store') }}">

        <div class="box-body">

          <div class="col-md-12">
                  
            @csrf    

            {!! __form::textbox(
              '5', 'name', 'text', 'Name *', 'Name', old('name'), $errors->has('name'), $errors->first('name'), 'required'
            ) !!}

            {!! __form::textbox(
              '3', 'route', 'text', 'Route', 'Route', old('route'), $errors->has('route'), $errors->first('route'), ''
            ) !!}

            {!! __form::select_static(
              '1', 'is_main', 'Is Main *', old('is_main'), ['1' => '1', '0' => '0'], $errors->has('is_main'), $errors->first('is_main'), '', 'required'
            ) !!}
            
            {!! __form::select_static(
              '1', 'is_active', 'Is Active *', old('is_active'), ['1' => '1', '0' => '0'], $errors->has('is_active'), $errors->first('is_active'), '', 'required'
            ) !!}

            {!! __form::textbox(
              '1', 'sequence', 'text', 'Sequence *', 'Sequence', old('sequence'), $errors->has('sequence'), $errors->first('sequence'), 'required'
            ) !!}

          </div>


          {{-- SUB NAV DYNAMIC TABLE GRID --}}
          <div class="col-md-12" style="padding-top:50px;">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Sub Navigation</h3>
                <button id="add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
              </div>
              
              <div class="box-body no-padding">
                
                <table class="table table-bordered">

                  <tr>
                    <th>Name *</th>
                    <th>Route *</th>
                    <th>Is Active *</th>
                      <th>Sequence *</th>
                    <th style="width: 40px"></th>
                  </tr>

                  <tbody id="table_body">


                    @if(old('row'))

                      @foreach(old('row') as $key => $value)

                        <tr>

                          <td>
                            <div class="form-group">
                              <input type="text" name="row[{{ $key }}][sub_name]" class="form-control" placeholder="Name" value="{{ $value['sub_name'] }}">
                              <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_name') }}</small>
                            </div>
                          </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" name="row[{{ $key }}][sub_route]" class="form-control" placeholder="Name" value="{{ $value['sub_route'] }}">
                                    <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_route') }}</small>
                                </div>
                            </td>


{{--                          <td>--}}
{{--                            <div class="form-group">--}}
{{--                              <input type="text" name="row[{{ $key }}][sub_route]" class="form-control" placeholder="Route" value="{{ $value['sub_route'] }}">--}}
{{--                              <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_route') }}</small>--}}
{{--                            </div>--}}
{{--                          </td>--}}

{{--                          <td>--}}
{{--                            <div class="form-group">--}}
{{--                              <input type="text" name="row[{{ $key }}][sub_is_active]" class="form-control" placeholder="Is Active" value="{{ $value['sub_is_active'] }}">--}}
{{--                              <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_is_active') }}</small>--}}
{{--                            </div>--}}
{{--                          </td>--}}


                          <td>
                            <div class="form-group">
                              <select name="row[{{ $key }}][sub_is_active]" class="form-control">
                                <option value="">Select</option>
                                  <option value="true" {!! $value['sub_is_active'] == "true" ? 'selected' : '' !!}>1</option>
                                  <option value="false" {!! $value['sub_is_active'] == "false" ? 'selected' : '' !!}>0</option>
                              </select>
                              <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_is_active') }}</small>
                            </div>
                          </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" name="row[{{ $key }}][sub_sequence]" class="form-control" placeholder="Sequence" value="{{ $value['sub_sequence'] }}">
                                    <small class="text-danger">{{ $errors->first('row.'. $key .'.sub_sequence') }}</small>
                                </div>
                            </td>


                          <td>
                              <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                          </td>

                        </tr>

                      @endforeach

                    @endif

                    </tbody>
                </table>
               
              </div>

            </div>
          </div>

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save <i class="fa fa-fw fa-save"></i></button>
        </div>

      </form>

    </div>

</section>

@endsection





@section('modals')

  @if(Session::has('NAVIGATION_CREATE_SUCCESS'))

    {!! __html::modal(
      'navigation_create', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('NAVIGATION_CREATE_SUCCESS')
    ) !!}
  
  @endif

@endsection 






@section('scripts')

  <script type="text/javascript">

    @if(Session::has('NAVIGATION_CREATE_SUCCESS'))
      $('#navigation_create').modal('show');
    @endif


    {{-- ADD ROW --}}
    $(document).ready(function() {
      $("#add_row").on("click", function() {
        var i = $("#table_body").children().length;
        var content ='<tr>' +
                        '<td>' +
                          '<div class="form-group">' +
                            '<input type="text" name="rows[' + i + '][sub_name]" class="form-control" placeholder="Name">' +
                          '</div>' +
                        '</td>' +

                        '<td>' +
                        '<div class="form-group">' +
                        '<input type="text" name="rows[' + i + '][sub_route]" class="form-control" placeholder="Route">' +
                        '</div>' +
                        '</td>' +

                        '<td>' +
                          '<div class="form-group">' +
                            '<select name="rows[' + i + '][sub_is_active]" class="form-control">' +
                              '<option value="">Select</option>' +
                              '<option value=1>1</option>' +
                              '<option value=0>0</option>' +
                            '</select>' +
                          '</div>' +
                        '</td>' +

                        '<td>' +
                        '<div class="form-group">' +
                        '<input type="text" name="rows[' + i + '][sub_sequence]" class="form-control" placeholder="Sequence">' +
                        '</div>' +
                        '</td>' +

                        '<td>' +
                            '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                        '</td>' +

                      '</tr>';
        $("#table_body").append($(content));
      });
    });
  </script>
    
@endsection