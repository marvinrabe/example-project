<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClockTest extends TestCase
{
    public function test_the_clock_page_returns_a_successful_response(): void
    {
        $response = $this->get('/clock');

        $response->assertStatus(200);
    }

    public function test_the_clock_page_contains_clock_element(): void
    {
        $response = $this->get('/clock');

        $response->assertSee('id="clock"', false);
    }
}
