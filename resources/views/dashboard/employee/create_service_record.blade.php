@php($rand = \Illuminate\Support\Str::random(15))
@extends('layouts.modal-content', ['form_id'=>'create_sr_form_'.$rand, 'slug'=>$employee->slug])

@section('modal-header')
    {{$employee->lastname}}, {{$employee->firstname}} - Add Service Record
@endsection

@section('modal-body')

        <div class="row">
            {!! __form::textbox(
               '4 sequence_no', 'sequence_no', 'text', 'Seq No. *', 'Seq No.', old('sequence_no'), $errors->has('sequence_no'), $errors->first('sequence_no'), ''
            ) !!}

            {!! __form::textbox(
               '4 date_from', 'date_from', 'date', 'Date From *', 'Date From', old('date_from'), $errors->has('date_from'), $errors->first('date_from'), ''
            ) !!}

            {!! __form::textbox(
               '4 date_to', 'date_to', 'date', 'Date To *', 'Date To', old('date_to'), $errors->has('date_to'), $errors->first('date_to'), ''
            ) !!}
        </div>

        <div class="row">
            {!! __form::textbox(
               '6 position', 'position', 'text', 'Position *', 'Position', old('position'), $errors->has('position'), $errors->first('position'), 'data-transform="uppercase"'
            ) !!}

            {!! __form::textbox(
               '6 appointment_status', 'appointment_status', 'text', 'Appointment Status *', 'Appointment Status', old('appointment_status'), $errors->has('appointment_status'), $errors->first('appointment_status'), 'data-transform="uppercase"'
            ) !!}
        </div>

        <div class="row">
            {!! __form::textbox_numeric(
              '8 salary', 'salary', 'text', 'Salary *', 'Salary', old('salary'), $errors->has('salary'), $errors->first('salary'), ''
            ) !!}

            {!! __form::textbox(
               '4 mode_of_payment', 'mode_of_payment', 'text', 'Mode of Payment *', 'Mode of Payment', old('mode_of_payment'), $errors->has('mode_of_payment'), $errors->first('mode_of_payment'), ''
            ) !!}
        </div>

        <div class="row">
            {!! __form::textbox(
               '4 station', 'station', 'text', 'Station *', 'Station', old('station'), $errors->has('station'), $errors->first('station'), ''
            ) !!}

            {!! __form::textbox(
               '4 gov_serve', 'gov_serve', 'text', 'Government Serve', 'Government Serve', old('gov_serve'), $errors->has('gov_serve'), $errors->first('gov_serve'), ''
            ) !!}

            {!! __form::textbox(
               '4 psc_serve', 'psc_serve', 'text', 'PSC Serve', 'PSC Serve', old('psc_serve'), $errors->has('psc_serve'), $errors->first('psc_serve'), ''
            ) !!}
        </div>

        <div class="row">
            {!! __form::textbox(
               '4 lwp', 'lwp', 'text', 'LWP', 'LWP', old('lwp'), $errors->has('lwp'), $errors->first('lwp'), ''
            ) !!}

            {!! __form::textbox(
               '4 spdate', 'spdate', 'text', 'SP Date', 'SP Date', old('spdate'), $errors->has('spdate'), $errors->first('spdate'), ''
            ) !!}

            {!! __form::textbox(
               '4 status', 'status', 'text', 'Status', 'Status', old('status'), $errors->has('status'), $errors->first('status'), ''
            ) !!}
        </div>

        <div class="row">
            {!! __form::textbox(
              '12 remarks', 'remarks', 'text', 'Remarks', 'Remarks', old('remarks'), $errors->has('remarks'), $errors->first('remarks'), ''
           ) !!}
        </div>



@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
<script type="text/javascript">
    $("#create_sr_form_{{$rand}}").submit(function (e) {
        e.preventDefault();
        uri = '{{route("dashboard.employee.service_record_store","slug")}}';
        uri = uri.replace('slug','{{$employee->slug}}');
        var form = $(this);
        loading_btn(form);
        $.ajax({
            url : uri,
            data : form.serialize(),
            type: 'POST',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
                succeed(form,true,false);
                sr_active = res.slug;
                service_records_tbl.draw(false);
                notify("Data successfully saved.","success");
            },
            error: function (res) {
                errored(form,res)
                console.log(res);
            }
        })
    })
</script>
@endsection

