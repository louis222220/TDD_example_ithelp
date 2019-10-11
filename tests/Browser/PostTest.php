<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use App\Post;
use App\Comment;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function testPostPage()
    {
        $this->browse(function (Browser $browser) {
            $posts = factory(Post::class, 2)->create();
            $comment = factory(Comment::class)->create([
                'user_id' => $posts[1]->user->id,
                'post_id' => $posts[1]->id
            ]);
            
            $browser->visit('/post')
                    ->assertSee('Post:')
                    ->assertSee($posts[1]->user->name)
                    ->assertSee($posts[1]->post_text)
                    ->assertSee('Leave a Comment:')
                    ->assertsee($comment->comment_text);
        });
    }
}
