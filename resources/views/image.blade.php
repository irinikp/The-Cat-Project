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
                    @if(property_exists($image, 'breeds'))
                        @foreach($image->breeds as $breed)
                            @if(property_exists($breed, 'weight'))
                                @if(property_exists($breed->weight, 'imperial'))
                                    Weight: {{$breed->weight->imperial}} (Imperial)
                                @endif
                                @if(property_exists($breed->weight, 'metric'))
                                    / {{$breed->weight->metric}} (metric)<br/>
                                @endif
                            @endif
                            @if(property_exists($breed, 'id'))
                                Id: {{$breed->id}}<br/>
                            @endif
                            @if(property_exists($breed, 'name'))
                                Name: {{$breed->name}}<br/>
                            @endif
                            @if(property_exists($breed, 'cfa_url'))
                                CFA URL: <a href="{{$breed->cfa_url}}" target="_blank">{{$breed->cfa_url}}</a><br/>
                            @endif
                            @if(property_exists($breed, 'vetstreet_url'))
                                Vet Street URL: <a href="{{$breed->vetstreet_url}}"
                                                   target="_blank">{{$breed->vetstreet_url}}</a>
                                <br/>
                            @endif
                            @if(property_exists($breed, 'vcahospitals_url'))
                                VCA Hospitals URL: <a href="{{$breed->vcahospitals_url}}"
                                                      target="_blank">{{$breed->vcahospitals_url}}</a>
                                <br/>
                            @endif
                            @if(property_exists($breed, 'temperament'))
                                Temperament: {{$breed->temperament}}<br/>
                            @endif
                            @if(property_exists($breed, 'origin'))
                                Origin: {{$breed->origin}}<br/>
                            @endif
                            @if(property_exists($breed, 'country_codes'))
                                Country code: {{$breed->country_codes}} / {{$breed->country_code}}<br/>
                            @endif
                            @if(property_exists($breed, 'description'))
                                Description: {{$breed->description}}<br/>
                            @endif
                            @if(property_exists($breed, 'life_span'))
                                Life span: {{$breed->life_span}}<br/>
                            @endif
                            @if(property_exists($breed, 'indoor'))
                                Indoor: {{$breed->indoor}}<br/>
                            @endif
                            @if(property_exists($breed, 'alt_names'))
                                Alternate names: {{$breed->alt_names}}<br/>
                            @endif
                            @if(property_exists($breed, 'adaptability'))
                                Adaptability: {{$breed->adaptability}}<br/>
                            @endif
                            @if(property_exists($breed, 'affection_level'))
                                Affection level: {{$breed->affection_level}}<br/>
                            @endif
                            @if(property_exists($breed, 'child_friendly'))
                                Child friendly: {{$breed->child_friendly}}<br/>
                            @endif
                            @if(property_exists($breed, 'dog_friendly'))
                                Dor friendly: {{$breed->dog_friendly}}<br/>
                            @endif
                            @if(property_exists($breed, 'energy_level'))
                                Energy level: {{$breed->energy_level}}<br/>
                            @endif
                            @if(property_exists($breed, 'grooming'))
                                Grooming: {{$breed->grooming}}<br/>
                            @endif
                            @if(property_exists($breed, 'health_issues'))
                                Health issues: {{$breed->health_issues}}<br/>
                            @endif
                            @if(property_exists($breed, 'intelligence'))
                                Intelligence: {{$breed->intelligence}}<br/>
                            @endif
                            @if(property_exists($breed, 'shedding_level'))
                                Shedding level: {{$breed->shedding_level}}<br/>
                            @endif
                            @if(property_exists($breed, 'social_needs'))
                                Social needs: {{$breed->social_needs}}<br/>
                            @endif
                            @if(property_exists($breed, 'stranger_friendly'))
                                Stranger friendly: {{$breed->stranger_friendly}}<br/>
                            @endif
                            @if(property_exists($breed, 'vocalisation'))
                                Vocalisation: {{$breed->vocalisation}}<br/>
                            @endif
                            @if(property_exists($breed, 'experimental'))
                                Experimental: {{$breed->experimental}}<br/>
                            @endif
                            @if(property_exists($breed, 'hairless'))
                                Hairless: {{$breed->hairless}}<br/>
                            @endif
                            @if(property_exists($breed, 'natural'))
                                Natural: {{$breed->natural}}<br/>
                            @endif
                            @if(property_exists($breed, 'rare'))
                                Rare: {{$breed->rare}}<br/>
                            @endif
                            @if(property_exists($breed, 'rex'))
                                Rex: {{$breed->rex}}<br/>
                            @endif
                            @if(property_exists($breed, 'suppressed_tail'))
                                Suppressed tail: {{$breed->suppressed_tail}}<br/>
                            @endif
                            @if(property_exists($breed, 'short_legs'))
                                Short legs: {{$breed->short_legs}}<br/>
                            @endif
                            @if(property_exists($breed, 'wikipedia_url'))
                                Wikipedia URL: <a href="{{$breed->wikipedia_url}}"
                                                  target="_blank">{{$breed->wikipedia_url}}</a>
                                <br/>
                            @endif
                            @if(property_exists($breed, 'hypoallergenic'))
                                Hypoallergenic: {{$breed->hypoallergenic}}<br/>
                            @endif
                        @endforeach
                    @endif
                    @if(sizeof($analysis) > 0 )
                        @if(property_exists($analysis[0], 'labels'))
                            @if(sizeof($analysis[0]->labels) > 0 )
                                @foreach ($analysis[0]->labels as $label)
                                    @if(property_exists($label, 'Name'))
                                        {{$label->Name}}&nbsp;
                                    @endif
                                @endforeach
                            @endif
                        @endif
                        <br/>
                        @if(property_exists($analysis[0], 'created_at'))
                            Created at {{$analysis[0]->created_at}}
                        @endif
                    @endif
                </figcaption>
            </figure>
        </div>
    </div>
