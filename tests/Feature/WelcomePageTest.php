<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomePageTest extends TestCase
{
    /**
     * Check if homepage returns 200 code.
     *
     * @return void
     */
    public function testStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Check if page displays the expected title.
     *
     * @TODO change this to check if the title appears specifically inside the <h1> heading
     * @return void
     */
    public function testPageTitle()
    {
        $welcome_message = 'Welcome to Twitch Client App';

        $response = $this->get('/');

        $response->assertSee($welcome_message);
    }
}
