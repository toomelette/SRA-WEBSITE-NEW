<h4></h4>
<p>
@php
    $Template = \App\Models\StationLaGranjaEvent::query()->get()->sortByDesc('id');
    $Year = \App\Models\Year::query()->get()->sortByDesc('id');
    $clYearList = array();
    foreach($Template as $cl){
    array_push($clYearList, $cl->year);
    }
    $clYearList = array_unique($clYearList);
@endphp
@if(count($Template) > 0)
    @foreach($Year as $year)
        @if(in_array($year->name, $clYearList))

            <div class="accordion accordion-group text-justify" id="our-values-accordion">
                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left {{($loop->iteration != 1) ? 'collapsed'  : ''}}" type="button" data-toggle="collapse" data-target="#collapse_{{$year->slug}}" aria-expanded="{{($loop->iteration == 1) ? 'true'  : 'false'}}" aria-controls="collapse1">
                               ANNOUNCEMENT {!!$year->name!!}
                            </button>

                        </h2>
                    </div>
                    <div id="collapse_{{$year->slug}}" class="collapse {{($loop->iteration == 1) ? 'show'  : ''}}" aria-labelledby="heading1" data-parent="#our-values-accordion" style="">
                        <div class="card-body">
                            <ul>
                                @foreach ($Template as $template)
                                    @if($year->name == $template->year)
                                        <li class="text-justify"><a class="btn" style="color: #ffb600" target="_blank" href="/view_file/station_lagranja_event/{!!$template->slug!!}" >{!!$template->title!!},</a>{!!$template->description!!}</li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @endif
            @foreach ($Template as $template)
            @if($year->slug == $template->year)

            @endif
            @endforeach
            @endforeach
            @endif
            </p><br>