@foreach( $images as $image)
    <a href="/image/{{$image->id}}"><img src="{{$image->url}}" alt="random cat image"/></a> <br/>
@endforeach
