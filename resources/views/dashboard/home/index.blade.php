@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>Website Management System</h1>
        <div class="col-lg-2 bg-success pull-right text-center" style="border: 1px solid green">
                @php
                    $Visitors = \App\Models\Visitors::query()->get()->sum('visitors');
                @endphp



                        <tr style="margin-top: 1px;">
                            <th><h3>Visitors Counter</h3></th>
                        </tr>

                        <tr>
                            <td><strong style="font-size: 30px;">{{str_pad($Visitors, 6, '0', STR_PAD_LEFT)}}</strong></td>
                        </tr>

        </div>

</section>

<section class="content">
    <div class="container">
        <div class="container-fluid">
            <div class="row text-center">
             <img width="50%" loading="lazy" class="bg-img" src="{{ url('constra/images/SRA/SRA_DA logo.png') }}" alt="img">
            </div>
        </div>
    </div>
</section>

@endsection





@section('scripts')

<script>



</script>

@endsection