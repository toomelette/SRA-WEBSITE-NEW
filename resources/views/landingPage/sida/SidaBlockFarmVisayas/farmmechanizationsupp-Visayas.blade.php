
<h4>Farm Mechanization Support</h4>
<p>
@php
    $mech_supp = \App\Models\BlockFarmMechSuppVis::query()->get()->sortByDesc('id');
    $Year = \App\Models\YearBlockFarm::query()->get()->sortByDesc('id');
    $clYearList = array();
    foreach($mech_supp as $cl){
    array_push($clYearList, $cl->year);
    }
    $clYearList = array_unique($clYearList);
@endphp
@if(count($mech_supp) > 0)
    @foreach($Year as $year)
        @if(in_array($year->name, $clYearList))

            <div class="accordion accordion-group text-justify" id="our-values-accordion3">
                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                                {!!$year->name!!}
                            </button>

                        </h2>
                    </div>
                    <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion3" style="">
                        <div class="card-body">
                            <ul>
                                @foreach ($mech_supp as $mechSupp)
                                    @if($year->name == $mechSupp->year)
                                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/home/sra_website/{!!$mechSupp->path!!}" >{!!$mechSupp->file_title!!},</a>{!!$mechSupp->title!!}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @endif
            @foreach ($mech_supp as $mechSupp)
            @if($year->slug == $mechSupp->year)

            @endif
            @endforeach
            @endforeach
            @endif
            </p><br>