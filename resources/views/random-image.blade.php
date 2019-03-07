@foreach( $images as $image)
    <img src="{{$image->url}}" alt="random cat image"/> <br/>
@endforeach
{{--@if(sizeof($analysis->labels) > 0 )--}}
    {{--@foreach ($analysis->labels as $label)--}}
        {{--{{$label->Name}}&nbsp;--}}
    {{--@endforeach--}}
{{--@endif--}}
{{--<br/>--}}
{{--Created at {{$analysis->created_at}}--}}
