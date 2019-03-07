<img src="{{$image->url}}" alt="image of cat"/><br/>
@if(property_exists($image, 'breeds'))
    @foreach($image->breeds as $breed)
        Weight: {{$breed->weight->imperial}} (Imperial) / {{$breed->weight->metric}} (metric)<br/>
        Id: {{$breed->id}}<br/>
        Name: {{$breed->name}}<br/>
        CFA URL: <a href="{{$breed->cfa_url}}" target="_blank">{{$breed->cfa_url}}</a><br/>
        Vet Street URL: <a href="{{$breed->vetstreet_url}}" target="_blank">{{$breed->vetstreet_url}}</a><br/>
        VCA Hospitals URL: <a href="{{$breed->vcahospitals_url}}" target="_blank">{{$breed->vcahospitals_url}}</a><br/>
        Temperament: {{$breed->temperament}}<br/>
        Origin: {{$breed->origin}}<br/>
        Country code: {{$breed->country_codes}} / {{$breed->country_code}}<br/>
        Description: {{$breed->description}}<br/>
        Life span: {{$breed->life_span}}<br/>
        Indoor: {{$breed->indoor}}<br/>
        Alternate names: {{$breed->alt_names}}<br/>
        Adaptability: {{$breed->adaptability}}<br/>
        Affection level: {{$breed->affection_level}}<br/>
        Child friendly: {{$breed->child_friendly}}<br/>
        Dor friendly: {{$breed->dog_friendly}}<br/>
        Energy level: {{$breed->energy_level}}<br/>
        Grooming: {{$breed->grooming}}<br/>
        Health issues: {{$breed->health_issues}}<br/>
        Intelligence: {{$breed->intelligence}}<br/>
        Shedding level: {{$breed->shedding_level}}<br/>
        Social needs: {{$breed->social_needs}}<br/>
        Stranger friendly: {{$breed->stranger_friendly}}<br/>
        Vocalisation: {{$breed->vocalisation}}<br/>
        Experimental: {{$breed->experimental}}<br/>
        Hairless: {{$breed->hairless}}<br/>
        Natural: {{$breed->natural}}<br/>
        Rare: {{$breed->rare}}<br/>
        Rex: {{$breed->rex}}<br/>
        Suppressed tail: {{$breed->suppressed_tail}}<br/>
        Short legs: {{$breed->short_legs}}<br/>
        Wikipedia URL: <a href="{{$breed->wikipedia_url}}" target="_blank">{{$breed->wikipedia_url}}</a><br/>
        Hypoallergenic: {{$breed->hypoallergenic}}<br/>
    @endforeach
@endif