<h4>Established HYV Nurseries</h4>
<p>
@php
    $estab_HYV_Nur = \App\Models\BlockFarmHYVNurseriesVis::query()->get()->sortByDesc('id');
    $Year = \App\Models\YearBlockFarm::query()->get()->sortByDesc('id');
    $clYearList = array();
    foreach($estab_HYV_Nur as $cl){
    array_push($clYearList, $cl->year);
    }
    $clYearList = array_unique($clYearList);
@endphp
@if(count($estab_HYV_Nur) > 0)
    @foreach($Year as $year)
        @if(in_array($year->name, $clYearList))

            <div class="accordion accordion-group text-justify" id="our-values-accordion">
                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse3_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                {!!$year->name!!}
                            </button>

                        </h2>
                    </div>
                    <div id="collapse3_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                        <div class="card-body">
                            <ul>
                                @foreach ($estab_HYV_Nur as $estabHYVNur)
                                    @if($year->name == $estabHYVNur->year)
                                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/block_farm_established_hyv_nurseries_visayas/{!!$estabHYVNur->slug!!}" >{!!$estabHYVNur->title!!},</a>{!!$estabHYVNur->description!!}</li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @endif
            @foreach ($estab_HYV_Nur as $estabHYVNur)
            @if($year->slug == $estabHYVNur->year)

            @endif
            @endforeach
            @endforeach
            @endif
            </p><br>