<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class PostFormTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function testRejectIfNotAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/post/form')
                    ->assertPathIs('/login');
        });
    }

    public function testPostByFormIfAuth()
    {
        factory(User::class)->create();
        
        $second_user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);
        $this->assertSame(2, $second_user->id);

        $this->browse(function ($browser) use ($second_user) {
            $browser->loginAs($second_user)
                    ->visit('/post/form')
                    ->type('post_text', "a testing post")
                    ->press('Send the post')
                    ->assertPathIs('/post')
                    ->assertSee('Post:');
        });

        $this->assertDatabaseHas('posts', [
            'post_text' => "a testing post",
            'user_id' => $second_user->id
        ]);
    }
}
