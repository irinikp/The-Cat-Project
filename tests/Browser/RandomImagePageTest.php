<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RandomImagePageTest extends DuskTestCase
{
    public function test_random_image_button_works()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/random-image')
                ->assertVisible('.reload-button')
                ->assertSeeIn('.reload-button', 'Reload');
        });
    }
}
