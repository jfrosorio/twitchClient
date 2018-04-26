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
}
