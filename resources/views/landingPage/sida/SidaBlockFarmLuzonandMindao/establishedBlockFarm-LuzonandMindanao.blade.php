<h4>Established Block Farm</h4>
<p>
@php
    $establihed = \App\Models\BlockFarmEstablishedLozunMindanao::query()->get()->sortByDesc('id');
    $Year = \App\Models\YearBlockFarm::query()->get()->sortByDesc('id');
    $clYearList = array();
    foreach($establihed as $cl){
    array_push($clYearList, $cl->year);
    }
    $clYearList = array_unique($clYearList);
@endphp
@if(count($establihed) > 0)
    @foreach($Year as $year)
        @if(in_array($year->name, $clYearList))

            <div class="accordion accordion-group text-justify" id="our-values-accordion">
                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                {!!$year->name!!}
                            </button>

                        </h2>
                    </div>
                    <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                        <div class="card-body">
                            <ul>
                                @foreach ($establihed as $Stablished)
                                    @if($year->name == $Stablished->year)
                                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/block_farm_established_lozun_mindanao/{!!$Stablished->slug!!}" >{!!$Stablished->file_title!!},</a>{!!$Stablished->title!!}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @endif
            @foreach ($establihed as $Stablished)
            @if($year->slug == $Stablished->year)

            @endif
            @endforeach
            @endforeach
            @endif
            </p><br>