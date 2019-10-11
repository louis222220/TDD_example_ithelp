<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;
use App\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function testInsertPostByPostRoute()
    {
        $users = factory(User::class, 2)->create();
        $second_user = $users[1];

        $text = "new post.";

        $this->actingAs($second_user)
             ->post('/post',[
                'post_text' => $text
        ]);

        $this->assertDatabaseHas('posts', [
            'post_text' => $text,
            'user_id' => $second_user->id
        ]);

        $response = $this->get('/post');
        $response->assertSee($text);
    }

    public function testCommentRoute()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $text = "new comment";

        $this->actingAs($user)
            ->post('/post/comment', [
            'post_id' => $post->id,
            'comment_text' => $text
        ]);

        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'comment_text' => $text
        ]);
    }
}
