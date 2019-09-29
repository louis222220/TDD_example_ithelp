<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * @return void
     */
    public function testTitle()
    {
        $response =$this->get('/');

        $response->assertSee('TDD_Blog');
    }
}
