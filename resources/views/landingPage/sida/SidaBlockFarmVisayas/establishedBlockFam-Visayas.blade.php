<h4>Established Block Farm</h4>
<p>
@php
    $bf_estab_v = \App\Models\BlockFarmEstablishedVisayas::query()->get()->sortByDesc('id');
    $Year = \App\Models\YearBlockFarm::query()->get()->sortByDesc('id');
    $clYearList = array();
    foreach($bf_estab_v as $cl){
    array_push($clYearList, $cl->year);
    }
    $clYearList = array_unique($clYearList);
@endphp
@if(count($bf_estab_v) > 0)
    @foreach($Year as $year)
        @if(in_array($year->name, $clYearList))
            @foreach ($bf_estab_v as $bfEstabV)
                @if($year->name == $bfEstabV->year)

            <div class="accordion accordion-group text-justify" id="our-values-accordion">
                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse1_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                {!!$year->name!!}
                            </button>

                        </h2>
                    </div>
                    <div id="collapse1_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                        <div class="card-body">
                            <ul>

                                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/block_farm_established_visayas/{!!$bfEstabV->slug!!}" >{!!$bfEstabV->file_title!!},</a>{!!$bfEstabV->title!!}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @endif
            @foreach ($bf_estab_v as $bfEstabV)
            @if($year->slug == $bfEstabV->year)

            @endif
            @endforeach
            @endforeach
            @endif
            </p><br>