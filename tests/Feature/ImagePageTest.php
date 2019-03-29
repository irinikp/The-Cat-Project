<?php

namespace Tests\Feature;

use Tests\TestCase;

class ImagePageTest extends TestCase
{
    public function test_retrieve_image_with_breed()
    {
        $response = $this->get('/image/klLnMZy3q');

        $response->assertStatus(200);
    }

    public function test_retrieve_image_without_breed()
    {
        $response = $this->get('/image/2pb');
        $response->assertStatus(200);
    }

    public function test_work_properly_when_breed_properties_are_missing()
    {
        $response = $this->get('/image/xBR2jSIG7');
        $response->assertStatus(200);
    }
}
