@include('layouts.css-plugins')
@php($useragent=$_SERVER['HTTP_USER_AGENT'])

@if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

    <style>
        /* Smartphones (portrait and landscape) ----------- */
        @media only screen
        and (min-device-width : 320px)
        and (max-device-width : 480px) {
            /* Styles */
            body {
                width: 90%;
                zoom: 200%;
            }
        }

    </style>
@endif
<body style="padding: 2em">
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="panel panel-default" >
            <div class="panel-heading">Form</div>
            <form id="insert_form">
                <div class="panel-body">
                    <div class="row">
                        {!! \App\Swep\ViewHelpers\__form2::select('type',[
                            'cols' => 6,
                            'label' => 'Type:',
                            'required' => 'required',
                            'options' => [
                                '10' => '10',
                                '20' => '20',
                                '30' => '30',
                                '40' => '40',
                            ],
                        ]) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('user',[
                            'cols' => '6',
                            'label' => 'U:',
                            'required' => 'required',
                        ]) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" name="device" required>
                                    <option value="0348143100222">21</option>
                                    <option value="0348143100080">22</option>
                                    <option selected value="0348143100084">23</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" name="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Time</label>
                                <input type="time" name="time" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/dashboard/dtr/reconstruct"><button  type="button" id="reset_btn" class="btn btn-warning pull-left">Reconstruct</button></a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary pull-right" type="submit">GO</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
@include('layouts.js-plugins')
<script type="text/javascript">

    $("#insert_form").submit(function (e) {
        e.preventDefault();
        form = $(this);
        $.ajax({
            url : '{{route("dashboard.set")}}?insert=1',
            data : form.serialize(),
            type: 'GET',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
                if(res == 1){
                    alert('Success');
                }
            },
            error: function (res) {
                alert('error');
                console.log(res);
            }
        })
    })

    {{--$("#reset_btn").click(function () {--}}
    {{--    var dev = $("#set_form select[name='dev']").val();--}}
    {{--    $.ajax({--}}
    {{--        url : '{{route("dashboard.set")}}?reset=1&dev='+dev,--}}
    {{--        type: 'GET',--}}
    {{--        headers: {--}}
    {{--            {!! __html::token_header() !!}--}}
    {{--        },--}}
    {{--        success: function (res) {--}}
    {{--            if(res == 1){--}}
    {{--                alert('Success');--}}
    {{--            }--}}
    {{--        },--}}
    {{--        error: function (res) {--}}
    {{--            console.log(res);--}}
    {{--        }--}}
    {{--    })--}}
    {{--})--}}
</script>


