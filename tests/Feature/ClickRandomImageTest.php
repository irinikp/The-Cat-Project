<?php

namespace Tests\Feature;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ClickRandomImageTest extends BaseTestCase
{
    use CreatesApplication;
    public $baseUrl = 'http://localhost';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
            ->click('Random Image')
            ->seePageIs('/random-image');
    }
}
