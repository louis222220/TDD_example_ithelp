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
        
        $response = $this->get('/posts/');
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

        $this->get("/posts/insert?post_text=$text");
        $response = $this->get('/posts/');

        $response->assertSee($text);
    }
}
