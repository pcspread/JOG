<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class BaseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'test1@test.com')
                    ->type('password', 'test1111')
                    ->press('.login-button')
                    ->assertPathIs('/');
            $browser->visit('/')
                    ->click('.top-button.put')
                    ->click('.main-title__button')
                    ->assertSee('求人を出す');
        });
    }
}
