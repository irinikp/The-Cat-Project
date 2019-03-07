<?php

namespace Tests\Feature;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class ClickLinksTest extends BaseTestCase
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
            ->click('Random Images')
            ->seePageIs('/random-image');
        $this->visit('/random-image')
            ->click('reload-button')
            ->seePageIs('/random-image');
    }
}
