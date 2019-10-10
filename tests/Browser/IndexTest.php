<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTest extends DuskTestCase
{
    public function testPostLinksInIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Post')
                    ->assertPathIs('/post');
        });
    }
}
