<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMainPageText()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('The Cat Project');
        $response->assertSeeText('Random Image');
    }
}
