<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->type('name', 'Louis')
                    ->type('email', 'l@com')
                    ->type('password', 'myPassword')
                    ->type('password_confirmation', 'myPassword')
                    ->press('Register');
        });

        $this->assertDatabaseHas('users', [
            'name' => 'Louis',
            'email' => 'l@com'
        ]);

    }
}
