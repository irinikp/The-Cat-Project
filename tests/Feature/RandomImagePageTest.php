<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RandomImagePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRandomImagePageText()
    {
        $response = $this->get('/random-image');

        $response->assertStatus(200);
        $response->assertSee('<img src="https://cdn2.thecatapi.com/images/');
        $response->assertSee('" alt="random cat image"/>');
    }
}
