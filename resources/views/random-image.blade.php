@include ('heads.title')
@include ('heads.gallery')
@include ('heads.default')

<!-- Page Content -->
<div class="container page-top">

    <div class="row text-center">
        <div class="col">
            <a name="reload-button" class="btn btn-light" onclick="location.reload();">Reload</a>
        </div>
    </div>

    <div class="row">


        @foreach( $images as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="/image/{{$image->id}}" class="fancybox" rel="ligthbox">
                    <img src="{{$image->url}}?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid " alt="">

                </a>
            </div>
        @endforeach

    </div>


</div>


