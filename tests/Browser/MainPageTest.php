<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MainPageTest extends DuskTestCase
{
    public function test_see_correct_title_on_main_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('The Cat Project')
                ->assertSeeLink('Random Image');
        });
    }
}
