<img src="{{$url}}" alt="random cat image"/> <br/>
@if(sizeof($analysis->labels) > 0 )
    @foreach ($analysis->labels as $label)
        {{$label->Name}}&nbsp;
    @endforeach
@endif
<br/>
Created at {{$analysis->created_at}}
