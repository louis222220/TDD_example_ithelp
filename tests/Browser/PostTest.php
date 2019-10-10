<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use App\Post;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function testPostPage()
    {
        $this->browse(function (Browser $browser) {
            $posts = factory(Post::class, 2)->create();
            
            $browser->visit('/post')
                    ->assertSee('Post:')
                    ->assertSee($posts[1]->post_text);

        });
    }
}
