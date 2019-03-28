<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RandomImagePageTest extends DuskTestCase
{
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/random-image')
                    ->assertVisible('.reload-butto')
                ->assertSeeIn('.reload-button', 'Reload');
        });
    }
}
