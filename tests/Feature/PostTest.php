<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }
    
    public function testAllPost()
    {
        $post = factory(Post::class)->create();
        
        $response = $this->get('/post');
        $response->assertStatus(200);
        $response->assertSee('All Posts:');

        $response->assertSee("Hello, I'm Louis.");
    }

    public function testInsertPost()
    {
        $post = factory(Post::class)->create();
        
        $this->assertDatabaseHas('posts', [
            'post_text' => "Hello, I'm Louis."
        ]);
    }

    public function testInsertPostByGetRoute()
    {
        $text = "It's a new post.";

        $this->get("/post/insert?post_text=$text");
        $response = $this->get('/post');

        $response->assertSee($text);
    }

    public function testInsertPostByPostRoute()
    {
        $text = "It's a new post.";

        $this->post('/post',
            ['post_text' => $text ]);

        $this->assertDatabaseHas('posts', ['post_text' => $text ]);

        $response = $this->get('/post');
        $response->assertSee($text);
    }
}
