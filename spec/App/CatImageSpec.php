<?php

namespace spec\App;

use App\Breed;
use App\CatImage;
use App\Weight;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CatImageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CatImage::class);
    }

    function it_generates_a_new_cat_image_with_breed()
    {
        $json = '{"id":"klLnMZy3q","url":"https://cdn2.thecatapi.com/images/klLnMZy3q.jpg","breeds":[{"weight":{"imperial":"7 - 20","metric":"3 - 9"},"id":"tvan","name":"Turkish Van","cfa_url":"http://cfa.org/Breeds/BreedsSthruT/TurkishVan.aspx","vetstreet_url":"http://www.vetstreet.com/cats/turkish-van","vcahospitals_url":"https://vcahospitals.com/know-your-pet/cat-breeds/turkish-van","temperament":"Agile, Intelligent, Loyal, Playful, Energetic","origin":"Turkey","country_codes":"TR","country_code":"TR","description":"While the Turkish Van loves to jump and climb, play with toys, retrieve and play chase, she is is big and ungainly; this is one cat who doesn’t always land on his feet. While not much of a lap cat, the Van will be happy to cuddle next to you and sleep in your bed. ","life_span":"12 - 17","indoor":0,"alt_names":"Turkish Cat, Swimming cat","adaptability":5,"affection_level":5,"child_friendly":4,"dog_friendly":5,"energy_level":5,"grooming":2,"health_issues":1,"intelligence":5,"shedding_level":3,"social_needs":4,"stranger_friendly":4,"vocalisation":5,"experimental":0,"hairless":0,"natural":1,"rare":0,"rex":0,"suppressed_tail":0,"short_legs":0,"wikipedia_url":"https://en.wikipedia.org/wiki/Turkish_Van","hypoallergenic":0}],"width":1022,"height":1024}';
        $parameters = json_decode($json);
        $this->populate($parameters);
        $this->id->shouldBe('klLnMZy3q');
        $this->url->shouldBe('https://cdn2.thecatapi.com/images/klLnMZy3q.jpg');
        $this->breed->shouldBeAnInstanceOf(Breed::class);
        $this->breed->weight->shouldBeAnInstanceOf(Weight::class);
//        $this->breed->weight->imperial->ShouldBe('7 - 20/');
//        $this->breed->weight->metric->ShouldBe('3 - 9');
        $this->breed->id->shouldBe('tvan');
        $this->breed->name->shouldBe('Turkish Van');
        $this->breed->cfa_url->shouldBe('http://cfa.org/Breeds/BreedsSthruT/TurkishVan.aspx');
        $this->breed->vetstreet_url->shouldBe('http://www.vetstreet.com/cats/turkish-van');
        $this->breed->vcahospitals_url->shouldBe('https://vcahospitals.com/know-your-pet/cat-breeds/turkish-van');
        $this->breed->temperament->shouldBe('Agile, Intelligent, Loyal, Playful, Energetic');
        $this->breed->origin->shouldBe('Turkey');
        $this->breed->country_codes->shouldBe('TR');
        $this->breed->country_code->shouldBe('TR');
        $this->breed->description->shouldBe('While the Turkish Van loves to jump and climb, play with toys, retrieve and play chase, she is is big and ungainly; this is one cat who doesn’t always land on his feet. While not much of a lap cat, the Van will be happy to cuddle next to you and sleep in your bed. ');
        $this->breed->life_span->shouldBe('12 - 17');
        $this->breed->indoor->shouldBe(0);
        $this->breed->alt_names->shouldBe('Turkish Cat, Swimming cat');
        $this->breed->adaptability->shouldBe(5);
        $this->breed->affection_level->shouldBe(5);
        $this->breed->child_friendly->shouldBe(4);
        $this->breed->dog_friendly->shouldBe(5);
        $this->breed->energy_level->shouldBe(5);
        $this->breed->grooming->shouldBe(2);
        $this->breed->health_issues->shouldBe(1);
        $this->breed->intelligence->shouldBe(5);
        $this->breed->shedding_level->shouldBe(3);
        $this->breed->social_needs->shouldBe(4);
        $this->breed->stranger_friendly->shouldBe(4);
        $this->breed->vocalisation->shouldBe(5);
        $this->breed->experimental->shouldBe(0);
        $this->breed->hairless->shouldBe(0);
        $this->breed->natural->shouldBe(1);
        $this->breed->rare->shouldBe(0);
        $this->breed->rex->shouldBe(0);
        $this->breed->suppressed_tail->shouldBe(0);
        $this->breed->short_legs->shouldBe(0);
        $this->breed->wikipedia_url->shouldBe('https://en.wikipedia.org/wiki/Turkish_Van');
        $this->breed->hypoallergenic->shouldBe(0);
    }

    function it_generates_a_new_cat_image_without_breed()
    {
        $json = '{"id":"2pb","url":"https://cdn2.thecatapi.com/images/2pb.gif","width":320,"height":240}';
        $parameters = json_decode($json);
        $this->populate($parameters);
        $this->id->shouldBe('2pb');
        $this->url->shouldBe('https://cdn2.thecatapi.com/images/2pb.gif');
    }

}
