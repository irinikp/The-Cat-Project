<?php

namespace Tests\Feature;

use Tests\TestCase;

class ImagePageTest extends TestCase
{
    public function test_see_correct_text_on_specific_image()
    {
        $response = $this->get('/image/klLnMZy3q');

        $response->assertStatus(200);
        $response->assertSee('<img src="https://cdn2.thecatapi.com/images/klLnMZy3q.jpg" alt="image of cat"');
        $response->assertSee('Weight: 7 - 20 (Imperial)');
        $response->assertSee('3 - 9 (Metric)<br/>');
        $response->assertSee('Id: tvan<br/>');
        $response->assertSee('Name: Turkish Van<br/>');
        $response->assertSee('CFA URL: <a href="http://cfa.org/Breeds/BreedsSthruT/TurkishVan.aspx"');
        $response->assertSee('Vet Street URL: <a href="http://www.vetstreet.com/cats/turkish-van"');
        $response->assertSee('VCA Hospitals URL: <a href="https://vcahospitals.com/know-your-pet/cat-breeds/turkish-van"');
        $response->assertSee('Temperament: Agile, Intelligent, Loyal, Playful, Energetic<br/>');
        $response->assertSee('Origin: Turkey<br/>');
        $response->assertSee('Country code: TR / TR<br/>');
        $response->assertSee('Description: While the Turkish Van loves to jump and climb, play with toys, retrieve and play chase, she is is big and ungainly; this is one cat who doesn’t always land on his feet. While not much of a lap cat, the Van will be happy to cuddle next to you and sleep in your bed. <br/>');
        $response->assertSee('Life span: 12 - 17<br/>');
        $response->assertDontSee('Indoor: 0<br/>');
        $response->assertSee('Alternate names: Turkish Cat, Swimming cat<br/>');
        $response->assertSee('Adaptability: 5<br/>');
        $response->assertSee('Affection level: 5<br/>');
        $response->assertSee('Child friendly: 4<br/>');
        $response->assertSee('Dor friendly: 5<br/>');
        $response->assertSee('Energy level: 5<br/>');
        $response->assertSee('Grooming: 2<br/>');
        $response->assertSee('Health issues: 1<br/>');
        $response->assertSee('Intelligence: 5<br/>');
        $response->assertSee('Shedding level: 3<br/>');
        $response->assertSee('Social needs: 4<br/>');
        $response->assertSee('Stranger friendly: 4<br/>');
        $response->assertSee('Vocalisation: 5<br/>');
        $response->assertDontSee('Experimental: 0<br/>');
        $response->assertDontSee('Hairless: 0<br/>');
        $response->assertSee('Natural: 1<br/>');
        $response->assertDontSee('Rare: 0<br/>');
        $response->assertDontSee('Rex: 0<br/>');
        $response->assertDontSee('Suppressed tail: 0<br/>');
        $response->assertDontSee('Short legs: 0<br/>');
        $response->assertSee('Wikipedia URL: <a href="https://en.wikipedia.org/wiki/Turkish_Van"');
        $response->assertDontSee('Hypoallergenic: 0<br/>');
        $response->assertSeeText('Angora');
        $response->assertSeeText('Pet');
        $response->assertSeeText('Mammal');
        $response->assertSeeText('Cat');
        $response->assertSeeText('Animal');
        $response->assertSeeText('Couch');
        $response->assertSeeText('Furniture');
        $response->assertSeeText('Cushion');
        $response->assertSeeText('Pillow');
        $response->assertSeeText('Manx');
        $response->assertSeeText('Created at 2018-12-07T12:10:47.000Z');
    }

    public function test_dont_see_any_text_when_its_not_there()
    {
        $response = $this->get('/image/2pb');
        $response->assertStatus(200);
        $response->assertSee('<img src="https://cdn2.thecatapi.com/images/2pb.gif" alt="image of cat"');
        $response->assertDontSee('Weight:');
        $response->assertDontSee('Created at');
    }

    public function test_work_properly_when_breed_properties_are_missing()
    {
        $response = $this->get('/image/xBR2jSIG7');
        $response->assertStatus(200);
    }
}
