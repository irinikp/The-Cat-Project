<?php

namespace Tests\Feature;

use App\CatImage;
use App\Http\CatApiIntegrator;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Mockery;
use Tests\TestCase;

class ImageControllerTest extends TestCase
{

    public function test_index_populates_a_collection_of_cats_based_on_the_json_output()
    {
        $service = Mockery::mock(CatApiIntegrator::class);

        $json_output = File::get(base_path('tests/data/sample_random_images.json'));
        $service->shouldReceive('search')->once()->andReturn(json_decode($json_output));

        $output = (new ImageController($service))->index();

        $collection = new Collection();
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_f1.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_hn.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_mj.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_q5.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_28o.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_34l.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_3it.json');
        $this->populateCatCollectionFromFile($collection, 'tests/data/sample_42e.json');

        $this->assertEquals($collection, $output);
    }

    public function test_show_a_created_cat_with_breed_based_on_the_json_output()
    {
        $id      = 'klLnMZy3q';
        $service = $this->getServiceForCatMockImage($id);

        $cat = (new ImageController($service))->show($id);
        $this->assertEquals($cat->id, $id);
        $this->assertEquals($cat->url, 'https://cdn2.thecatapi.com/images/klLnMZy3q.jpg');
        $this->assertEquals($cat->breed->weight->imperial, '7 - 20');
        $this->assertEquals($cat->breed->weight->metric, '3 - 9');
        $this->assertEquals($cat->breed->id, 'tvan');
        $this->assertEquals($cat->breed->name, 'Turkish Van');
        $this->assertEquals($cat->breed->cfa_url, 'http://cfa.org/Breeds/BreedsSthruT/TurkishVan.aspx');
        $this->assertEquals($cat->breed->vetstreet_url, 'http://www.vetstreet.com/cats/turkish-van');
        $this->assertEquals($cat->breed->vcahospitals_url, 'https://vcahospitals.com/know-your-pet/cat-breeds/turkish-van');
        $this->assertEquals($cat->breed->temperament, 'Agile, Intelligent, Loyal, Playful, Energetic');
        $this->assertEquals($cat->breed->origin, 'Turkey');
        $this->assertEquals($cat->breed->country_codes, 'TR');
        $this->assertEquals($cat->breed->country_code, 'TR');
        $this->assertEquals($cat->breed->description, 'While the Turkish Van loves to jump and climb, play with toys, retrieve and play chase, she is is big and ungainly; this is one cat who doesn’t always land on his feet. While not much of a lap cat, the Van will be happy to cuddle next to you and sleep in your bed. ');
        $this->assertEquals($cat->breed->life_span, '12 - 17');
        $this->assertEquals($cat->breed->indoor, 0);
        $this->assertEquals($cat->breed->alt_names, 'Turkish Cat, Swimming cat');
        $this->assertEquals($cat->breed->adaptability, 5);
        $this->assertEquals($cat->breed->affection_level, 5);
        $this->assertEquals($cat->breed->child_friendly, 4);
        $this->assertEquals($cat->breed->dog_friendly, 5);
        $this->assertEquals($cat->breed->energy_level, 5);
        $this->assertEquals($cat->breed->grooming, 2);
        $this->assertEquals($cat->breed->health_issues, 1);
        $this->assertEquals($cat->breed->intelligence, 5);
        $this->assertEquals($cat->breed->shedding_level, 3);
        $this->assertEquals($cat->breed->social_needs, 4);
        $this->assertEquals($cat->breed->stranger_friendly, 4);
        $this->assertEquals($cat->breed->vocalisation, 5);
        $this->assertEquals($cat->breed->experimental, 0);
        $this->assertEquals($cat->breed->hairless, 0);
        $this->assertEquals($cat->breed->natural, 1);
        $this->assertEquals($cat->breed->rare, 0);
        $this->assertEquals($cat->breed->rex, 0);
        $this->assertEquals($cat->breed->suppressed_tail, 0);
        $this->assertEquals($cat->breed->short_legs, 0);
        $this->assertEquals($cat->breed->wikipedia_url, 'https://en.wikipedia.org/wiki/Turkish_Van');
        $this->assertEquals($cat->breed->hypoallergenic, 0);
        $this->assertContains('Mammal', $cat->labels);
        $this->assertContains('Jaguar', $cat->labels);
        $this->assertContains('Wildlife', $cat->labels);
        $this->assertContains('Panther', $cat->labels);
        $this->assertContains('Animal', $cat->labels);
        $this->assertContains('Leopard', $cat->labels);
        $this->assertContains('Pet', $cat->labels);
        $this->assertContains('Manx', $cat->labels);
        $this->assertContains('Cat', $cat->labels);
        $this->assertContains('Abyssinian', $cat->labels);
        $this->assertEquals($cat->created_at, '2018-12-06T03:10:00.000Z');
    }

    public function test_show_a_created_cat_without_breed_based_on_the_json_output()
    {
        $id      = '2pb';
        $service = $this->getServiceForCatMockImage($id);

        $cat = (new ImageController($service))->show($id);
        $this->assertEquals($cat->id, $id);
        $this->assertEquals($cat->url, 'https://cdn2.thecatapi.com/images/2pb.gif');
    }

    /**
     * @param int $id
     *
     * @return CatApiIntegrator|Mockery\MockInterface
     */
    protected function getServiceForCatMockImage($id)
    {
        $service = Mockery::mock(CatApiIntegrator::class);

        $json_output          = File::get(base_path('tests/data/sample_' . $id . '.json'));
        $json_analysis_output = File::get(base_path('tests/data/sample_analysis_' . $id . '.json'));
        $service->shouldReceive('get')->once()->withArgs([$id])->andReturn(json_decode($json_output));
        $service->shouldReceive('analysis')->once()->withArgs([$id])->andReturn(json_decode($json_analysis_output));

        return $service;

    }

    /**
     * @param Collection $collection
     * @param string     $json_file
     */
    protected function populateCatCollectionFromFile(Collection &$collection, $json_file)
    {
        $cat_image = CatImage::populate(json_decode(File::get(base_path($json_file))));
        $collection->add($cat_image);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
