@php($rand = \Illuminate\Support\Str::random(15))
@php($uri = route('dashboard.budget_proposal.update',$pap->slug))
@extends('layouts.modal-content',['form_id'=> 'edit_pap_form_'.$rand,'slug'=>$pap->slug, 'uri' => $uri])

@section('modal-header')
    {{$pap->pap_code}} - {{$pap->pap_title}}
@endsection

@section('modal-body')
    <div class="row">
        <div class="col-md-6">
            <b>Year:</b>
            <p>{{$pap->fiscal_year}}</p>
        </div>
        <div class="col-md-6">
            <b>Responsibility Center:</b>
            <p>{{$pap->resp_center}}</p>
        </div>
    </div>
    <div style="display: none">
        <input name="slug" value="{{$pap->slug}}">
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('pap_code',[
            'cols' => 6,
            'label' => 'PAP Code:',
        ],
        $pap
        ) !!}

        {!! \App\Swep\ViewHelpers\__form2::select('budget_type',[
            'cols' => 6,
            'label' => 'Budget Types:',
            'options' => [
                'COB' => 'Corporate',
                'SIDA' => 'SIDA',
            ],
        ],
        $pap
        ) !!}

    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('pap_title',[
            'cols' => 12,
            'label' => 'PAP Title:',
        ],
        $pap
        ) !!}

    </div>

    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('division',[
            'cols' => 12,
            'label' => 'Division:*',
            'id' => 'division_'.$rand,
            'autocomplete' => 'off',
        ],
        $pap
        ) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('section',[
            'cols' => 12,
            'label' => 'Section:',
            'id' => 'section_'.$rand,
            'autocomplete' => 'off',
        ],
        $pap
        ) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textarea('pap_desc',[
            'cols' => 12,
            'label' => 'PAP Description:',
            'rows' => 3,
        ],
        $pap) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('ps',[
            'cols' => 4,
            'label' => 'PS:',
            'class' => 'autonum',
        ],
        $pap
        ) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('co',[
            'cols' => 4,
            'label' => 'Capital Outlay:',
            'class' => 'autonum',
        ],
        $pap
        ) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('mooe',[
            'cols' => 4,
            'label' => 'MOOE:',
            'class' => 'autonum',
        ],
        $pap
        ) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('pcent_share',[
            'cols' => 4,
            'label' => 'Percent Share:',
            'type' => 'number',
        ],
        $pap
        ) !!}
    </div>


@endsection

@section('modal-footer')
    <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
<script type="text/javascript">
    $("#edit_pap_form_{{$rand}}").submit(function (e) {
        e.preventDefault();
        let form = $(this);
        loading_btn(form);
        let uri = form.attr('uri');
        $.ajax({
            url : uri,
            data : form.serialize(),
            type: 'PATCH',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
               succeed(form, true,true);
               active = res.slug;
               pap_tbl.draw(false);
               notify('PAP was successfully updated.','success');
            },
            error: function (res) {
                errored(form,res);
            }
        })
    })

    $("#division_{{$rand}}").typeahead({
        ajax : "{{ route('dashboard.budget_proposal.index') }}?typeahead=true&for=division",
        onSelect:function (result) {
            console.log(result);
        },
        lookup: function (i) {
            console.log(i);
        }
    });

    $("#section_{{$rand}}").typeahead({
        ajax : "{{ route('dashboard.budget_proposal.index') }}?typeahead=true&for=section",
        onSelect:function (result) {
            console.log(result);
        },
        lookup: function (i) {
            console.log(i);
        }
    });
</script>
@endsection

