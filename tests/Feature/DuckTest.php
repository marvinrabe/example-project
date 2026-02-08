<?php

namespace Tests\Feature;

use Tests\TestCase;

class DuckTest extends TestCase
{
    public function test_the_duck_page_returns_a_successful_response(): void
    {
        $response = $this->get('/duck');

        $response->assertStatus(200);
    }

    public function test_the_duck_page_contains_duck_element(): void
    {
        $response = $this->get('/duck');

        $response->assertSee('id="duck"', false);
    }
}
