<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function testPostLinkInIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Post')
                    ->assertPathIs('/post');
        });
    }

    public function testPostLinkInHomePage()
    {
        $this->browse(function (Browser $browser){
            $user = factory(\App\User::class)->create();
            
            $browser->loginAs($user)
                    ->visit('/home')
                    ->clickLink('Post')
                    ->assertPathIs('/post');
        });
    }
}
