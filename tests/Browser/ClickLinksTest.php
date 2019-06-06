<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ClickLinksTest extends DuskTestCase
{
    public $baseUrl = 'http://localhost';

    public function test_random_image_button_goes_to_random_image_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Random Images')
                ->assertPathIs('/random-image');
        });
    }
//
//    public function test_reload_button_reloads()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/random-image')->waitForLink('reload-button')
//                ->clickLink('reload-button')
//                ->waitForReload()
//                ->assertPathIs('/random-image');
//        });
//    }
}
