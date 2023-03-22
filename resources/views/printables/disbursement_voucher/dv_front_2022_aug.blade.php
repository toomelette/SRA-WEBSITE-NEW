<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disbursement Voucher</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--    <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

    {{--    <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('css/print.css') }}?s={{\Illuminate\Support\Str::random()}}">


    <style type="text/css">

        .div-height{

            margin-bottom: -50px;
            padding-bottom: 50px;
            overflow: hidden;

        }

        td{
            border: 1px solid black;
            padding-left: 2px;
        }

        .top-left{
            float: left;
        }

    </style>

</head>
<body>

    <div class="printable font-px14">
        <table id="dv_table" style="width: 100%">
            <tr>
                <td colspan="3" rowspan="4" class="no-border-bottom no-border-right" style="width: 300px">
                    <div style=" width: 100%">
                        <div style="width: 100%; float: left">
                            <center>
                                <img src="{{ asset('images/sra.png') }}" style="width:90px; float: right">
                            </center>
                        </div>

                    </div>
                </td>
                <td colspan="7" class="text-strong text-center no no-border-bottom no-border-left text-strong">Republic of the Philippines</td>
                <td colspan="2" class="text-strong no-border-bottom font-px11">Fund Cluster:</td>
            </tr>
            <tr>
                <td colspan="7" class="text-strong text-center no-border-top no-border-bottom no-border-left">SUGAR REGULATORY ADMINISTRATION</td>
                <td colspan="2" class="no-border-top text-strong f-12">{{(isset(\App\Swep\Helpers\Helper::budgetTypes()[$dv->fund_source])) ? \App\Swep\Helpers\Helper::budgetTypes()[$dv->fund_source] : $dv->fund_source}}</td>
            </tr>
            <tr>
                <td colspan="7"  class="text-strong text-center no-border-top no-border-bottom no-border-left">Araneta Street, Singcang, Bacolod City</td>
                <td colspan="2" class="text-strong no-border-bottom font-px12">Date: {{\Illuminate\Support\Carbon::parse($dv->date)->format('F d, Y')}}</td>
            </tr>
            <tr>
                <td colspan="7" class="no-border-top no-border-bottom no-border-left"></td>
                <td colspan="2" class="no-border-top no-border-bottom font-px11">DV No.:</td>
            </tr>
            <tr>
                <td colspan="3" class="no-border-top no-border-right"></td>
                <td colspan="7" class="text-strong font-px18 text-center no-border-top no-border-left">DISBURSEMENT VOUCHER</td>
                <td colspan="2" class="no-border-top text-strong f-12">{{$dv->dv_no}}</td>
            </tr>
            <tr class="font-px12 text-strong">
                <td rowspan="2" colspan="2">Mode of Payment</td>
                <td rowspan="2" class="text-center no-border-right">
                    <div style="width: 20px; height: 20px; border: 1.4px solid; float: right; {{($dv->mode_of_payment == 'CHECK')? 'background-color: black' : ''}}"></div>
                </td>
                <td rowspan="2" class="no-border-left no-border-right">MDS Check</td>
                <td rowspan="2" class="no-border-left no-border-right">
                    <div style="width: 20px; height: 20px; border: 1.4px solid; float: right ;{{($dv->mode_of_payment == 'COM_CHECK')? 'background-color: black' : ''}}"></div>
                </td>
                <td rowspan="2"  class="no-border-left no-border-right">Commercial Check</td>
                <td rowspan="2" colspan="2"  class="no-border-left no-border-right">
                    <div style="width: 20px; height: 20px; border: 1.4px solid; float: right ; {{($dv->mode_of_payment == 'ADA')? 'background-color: black' : ''}}"></div>
                </td>
                <td rowspan="2" class="no-border-left no-border-right">ADA</td>
                <td rowspan="2"  class="no-border-left no-border-right">
                    <div style="width: 20px; height: 20px; border: 1.4px solid; float: right; {{($dv->mode_of_payment == 'OTHERS')? 'background-color: black' : ''}}"></div>
                </td>
                <td colspan="2" class="no-border-bottom no-border-left ">Others (Please specify)</td>
            </tr>
            <tr class="font-px12">
                <td colspan="2" class="no-border-top no-border-left">{{$dv->mode_of_payment_specify}}</td>
            </tr>
            <tr class="text-strong ">
                <td colspan="2" rowspan="2" class="font-px11">Payee</td>
                <td colspan="6" rowspan="2">{{strtoupper($dv->payee)}}</td>
                <td colspan="3" class="no-border-bottom font-px11">TIN/Employee No.:</td>
                <td class="no-border-bottom font-px11">ORS/BURS NO.:</td>
            </tr>

            <tr class="text-strong">
                <td colspan="3" class="no-border-bottom no-border-top">{!! ($dv->tin == '') ? '<br>': $dv->tin !!}</td>
                <td class="no-border-bottom no-border-top">{{$dv->bur_no}}</td>
            </tr>
            <tr class="text-strong">
                <td colspan="2" class="font-px11">Address</td>
                <td colspan="10">{{$dv->address}}</td>
            </tr>
            <tr class="text-strong font-px11">

                <td colspan="8" class="text-center">Particulars</td>
                <td class="text-center">RC</td>
                <td class="text-center" colspan="2">MFO/PAP</td>
                <td class="text-center">Amount</td>
            </tr>
            @php($total = 0)
            @if(!empty($dv->details))
                @php($n = 0)
                @foreach($dv->details as $detail)
                    @php($total = $total+$detail->amount)
                    @php($n++)
                    <tr >
                        @if($n <= 1)
                            <td colspan="8" class="explanation" rowspan="{{$dv->details()->count()}}">
                                {!! $dv->explanation!!}
                            </td>
                        @endif
                        <td class="text-top text-center f-12">{{$detail->resp_center}}</td>
                        <td class="text-top text-center f-12" colspan="2">{{$detail->mfo_pap}}</td>
                        <td class="text-right text-top f-12">{{number_format($detail->amount,2)}}</td>
                    </tr>
                @endforeach
            @else
            @endif

            <tr class="text-strong">
                <td colspan="8" class="text-center">Amount Due</td>
                <td></td>
                <td colspan="2"></td>
                <td class="text-right ">{{number_format($total,2)}}</td>
            </tr>
            <tr class="text-strong font-px11">
                <td class="letter">A</td>
                <td colspan="11" class="no-border-bottom">Certified: Expenses/Cash Advance necessary, lawful and incurred under my direct supervision</td>
            </tr>

            <tr  class="text-strong font-px11">
                <td style="padding-top: 20px" colspan="12" class="no-border-top no-border-bottom text-center">
                    @if($dv->certified_supervisor != '')
                        <p class="no-margin"><u>{{$dv->certified_supervisor}}</u></p>
                        <p class="no-margin">{{$dv->certified_supervisor_position}}</p>
                    @else
                        ____________________________________________________________
                    @endif
                </td>
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="12" class="text-center no-border-top">Printed Name, Designation and Signature of Supervisor</td>
            </tr>
            <tr  class="text-strong font-px11">
                <td>B</td>
                <td colspan="11">Accounting Entry:</td>
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="6" class="text-center">Account Title</td>
                <td colspan="3" class="text-center">UACS Code</td>
                <td colspan="2" class="text-center">Debit</td>
                <td class="text-center">Credit</td>
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="6" class="text-center" style="padding-top: 80px"></td>
                <td colspan="3" class="text-center" style="padding-top: 80px"></td>
                <td colspan="2" class="text-center" style="padding-top: 80px"></td>
                <td class="text-center" style="padding-top: 80px"></td>
            </tr>
            <tr  class="text-strong font-px11">
                <td>C</td>
                <td colspan="5">Certified:</td>
                <td class="letter">D</td>
                <td colspan="5">Approved Payment:</td>
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="6" class="font-px11 no-border-bottom no-border-top">
                    <div>
                        <div style="width: 30px; float: left; padding-top: 1px">
                            <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                        </div>
                        <div style="float:left;">
                            Cash Available
                        </div>
                    </div>

                </td>
                <td colspan="6" rowspan="3"></td>
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="6" class="font-px11 no-border-bottom no-border-top">
                    <div>
                        <div style="width: 30px; float: left; padding-top: 1px">
                            <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                        </div>
                        <div style="float:left;">
                            Subject to Authority to Debit Account (when applicable)
                        </div>
                    </div>
                </td>
{{--                <td colspan="6"></td>--}}
            </tr>
            <tr  class="text-strong font-px11">
                <td colspan="6" class="font-px11 no-border-bottom no-border-top" style="padding-bottom: 5px">
                    <div>
                        <div style="width: 30px; float: left; padding-top: 1px">
                            <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                        </div>
                        <div style="float:left;">
                            Supporting documents complete and amount claimed
                        </div>
                    </div>
                </td>
{{--                <td colspan="6"></td>--}}
            </tr>

            <tr class="font-px11 text-strong" style="height: 30px">
                <td colspan="2" class="text-center">Signature</td>
                <td colspan="4"></td>
                <td colspan="3" class="text-center">Signature</td>
                <td colspan="3"></td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="2" class="text-center">Printed Name</td>
                <td colspan="4" class="text-center">{{$dv->certified_by}}</td>
                <td colspan="3" class="text-center">Printed Name</td>
                <td colspan="3" class="text-center">{{$dv->approved_by}}</td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="2" rowspan="2" class="text-center">Position</td>
                <td colspan="4" class="text-center">{{$dv->certified_by_position}}</td>
                <td colspan="3" rowspan="2" class="text-center">Position</td>
                <td colspan="3" class="text-center">{{$dv->approved_by_position}}</td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="4" class="text-center">Head, Accounting Unit/Authorized Representative</td>
                <td colspan="3" class="text-center">Agency Head/Authorized Representative</td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="2" class="text-center">Date</td>
                <td colspan="4"></td>
                <td colspan="3" class="text-center">Date</td>
                <td colspan="3"></td>
            </tr>
            <tr  class="text-strong font-px11">
                <td>E</td>
                <td colspan="10">Receipt of Payment</td>
                <td>JEV No.</td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="2" class="no-border-bottom">Check/</td>
                <td colspan="3" rowspan="2"></td>
                <td class="no-border-bottom">Date:</td>
                <td colspan="5" class="no-border-bottom">Bank Name & Account Number</td>
                <td rowspan="2"></td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="2" class="no-border-top">ADA No.:</td>
                <td class="no-border-top"></td>
                <td colspan="5" class="no-border-top"></td>
            </tr>
            <tr class="font-px11 text-strong" style="height: 40px">
                <td colspan="2">Signature</td>
                <td colspan="3"></td>
                <td style="vertical-align: top; text-align: left">Date:</td>
                <td style="vertical-align: top; text-align: left" colspan="5">Printed Name:</td>
                <td  style="vertical-align: top; text-align: left" rowspan="2">Date:</td>
            </tr>
            <tr class="font-px11 text-strong">
                <td colspan="11">Official Receipt No. & Date/Other Documents</td>
            </tr>
        </table>
        <p class="no-margin text-strong" style="text-align: right; font-size: 10px">
            FMD-AFD-ACC-001, Rev. 01<br>
            Effectivity Date: August 18, 2022
        </p>
    </div>
</body>

</html>
