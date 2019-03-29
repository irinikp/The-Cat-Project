@include ('heads.title')
@include ('heads.gallery')
@include ('heads.default')

<!-- Page Content -->
<div class="container page-top">

    <div class="row text-center">
        <div class="col">
            <figure class="figure">
                <img src="{{$image->url}}" alt="image of cat" class="figure-img img-fluid rounded"/>
                <figcaption class="figure-caption">
                    @if(!empty($image->breed->weight))
                        @if(!empty($image->breed->weight->imperial))
                            Weight: {{$image->breed->weight->imperial}} (Imperial)
                        @endif
                        @if(!empty($image->breed->weight->metric))
                            / {{$image->breed->weight->metric}} (Metric)<br/>
                        @endif
                    @endif
                    @if(!empty($image->breed->id))
                        Id: {{$image->breed->id}}<br/>
                    @endif
                    @if(!empty($image->breed->name))
                        Name: {{$image->breed->name}}<br/>
                    @endif
                    @if(!empty($image->breed->cfa_url))
                        CFA URL: <a href="{{$image->breed->cfa_url}}" target="_blank">{{$image->breed->cfa_url}}</a>
                        <br/>
                    @endif
                    @if(!empty($image->breed->vetstreet_url))
                        Vet Street URL: <a href="{{$image->breed->vetstreet_url}}"
                                           target="_blank">{{$image->breed->vetstreet_url}}</a>
                        <br/>
                    @endif
                    @if(!empty($image->breed->vcahospitals_url))
                        VCA Hospitals URL: <a href="{{$image->breed->vcahospitals_url}}"
                                              target="_blank">{{$image->breed->vcahospitals_url}}</a>
                        <br/>
                    @endif
                    @if(!empty($image->breed->temperament))
                        Temperament: {{$image->breed->temperament}}<br/>
                    @endif
                    @if(!empty($image->breed->origin))
                        Origin: {{$image->breed->origin}}<br/>
                    @endif
                    @if(!empty($image->breed->country_codes))
                        Country code: {{$image->breed->country_codes}} / {{$image->breed->country_code}}<br/>
                    @endif
                    @if(!empty($image->breed->description))
                        Description: {{$image->breed->description}}<br/>
                    @endif
                    @if(!empty($image->breed->life_span))
                        Life span: {{$image->breed->life_span}}<br/>
                    @endif
                    @if(!empty($image->breed->indoor))
                        Indoor: {{$image->breed->indoor}}<br/>
                    @endif
                    @if(!empty($image->breed->alt_names))
                        Alternate names: {{$image->breed->alt_names}}<br/>
                    @endif
                    @if(!empty($image->breed->adaptability))
                        Adaptability: {{$image->breed->adaptability}}<br/>
                    @endif
                    @if(!empty($image->breed->affection_level))
                        Affection level: {{$image->breed->affection_level}}<br/>
                    @endif
                    @if(!empty($image->breed->child_friendly))
                        Child friendly: {{$image->breed->child_friendly}}<br/>
                    @endif
                    @if(!empty($image->breed->dog_friendly))
                        Dor friendly: {{$image->breed->dog_friendly}}<br/>
                    @endif
                    @if(!empty($image->breed->energy_level))
                        Energy level: {{$image->breed->energy_level}}<br/>
                    @endif
                    @if(!empty($image->breed->grooming))
                        Grooming: {{$image->breed->grooming}}<br/>
                    @endif
                    @if(!empty($image->breed->health_issues))
                        Health issues: {{$image->breed->health_issues}}<br/>
                    @endif
                    @if(!empty($image->breed->intelligence))
                        Intelligence: {{$image->breed->intelligence}}<br/>
                    @endif
                    @if(!empty($image->breed->shedding_level))
                        Shedding level: {{$image->breed->shedding_level}}<br/>
                    @endif
                    @if(!empty($image->breed->social_needs))
                        Social needs: {{$image->breed->social_needs}}<br/>
                    @endif
                    @if(!empty($image->breed->stranger_friendly))
                        Stranger friendly: {{$image->breed->stranger_friendly}}<br/>
                    @endif
                    @if(!empty($image->breed->vocalisation))
                        Vocalisation: {{$image->breed->vocalisation}}<br/>
                    @endif
                    @if(!empty($image->breed->experimental))
                        Experimental: {{$image->breed->experimental}}<br/>
                    @endif
                    @if(!empty($image->breed->hairless))
                        Hairless: {{$image->breed->hairless}}<br/>
                    @endif
                    @if(!empty($image->breed->natural))
                        Natural: {{$image->breed->natural}}<br/>
                    @endif
                    @if(!empty($image->breed->rare))
                        Rare: {{$image->breed->rare}}<br/>
                    @endif
                    @if(!empty($image->breed->rex))
                        Rex: {{$image->breed->rex}}<br/>
                    @endif
                    @if(!empty($image->breed->suppressed_tail))
                        Suppressed tail: {{$image->breed->suppressed_tail}}<br/>
                    @endif
                    @if(!empty($image->breed->short_legs))
                        Short legs: {{$image->breed->short_legs}}<br/>
                    @endif
                    @if(!empty($image->breed->wikipedia_url))
                        Wikipedia URL: <a href="{{$image->breed->wikipedia_url}}"
                                          target="_blank">{{$image->breed->wikipedia_url}}</a>
                        <br/>
                    @endif
                    @if(!empty($image->breed->hypoallergenic))
                        Hypoallergenic: {{$image->breed->hypoallergenic}}<br/>
                    @endif
                    @foreach ($image->labels as $label)
                        {{$label}}&nbsp;
                    @endforeach
                    <br/>
                    @if(!empty($image->created_at))
                        Created at {{$image->created_at}}
                    @endif
                </figcaption>
            </figure>
        </div>
    </div>
