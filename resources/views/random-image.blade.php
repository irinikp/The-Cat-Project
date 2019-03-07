@foreach( $images as $image)
    <a href="/image/{{$image->id}}"><img src="{{$image->url}}" alt="random cat image"/></a> <br/>
@endforeach
{{--@if(sizeof($analysis->labels) > 0 )--}}
    {{--@foreach ($analysis->labels as $label)--}}
        {{--{{$label->Name}}&nbsp;--}}
    {{--@endforeach--}}
{{--@endif--}}
{{--<br/>--}}
{{--Created at {{$analysis->created_at}}--}}
