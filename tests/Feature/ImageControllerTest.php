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
        $service->shouldReceive('search')->andReturn(json_decode($json_output));

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

//    public function test_show_creates_a_cat_based_on_the_json_output()
//    {
//        $service = Mockery::mock(CatApiIntegrator::class);
//
//    }


    public function tearDown(): void
    {
        Mockery::close();
    }

    private function populateCatCollectionFromFile(Collection &$collection, $json_file)
    {
        $cat_image = new CatImage();
        $cat_image->populate(json_decode(File::get(base_path($json_file))));
        $collection->add($cat_image);
    }
}
