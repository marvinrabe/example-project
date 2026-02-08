<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_countries_page_returns_a_successful_response(): void
    {
        $response = $this->get('/countries');

        $response->assertStatus(200);
    }

    public function test_the_countries_page_contains_countries_list(): void
    {
        $response = $this->get('/countries');

        $response->assertSee('id="countries-list"', false);
    }

    public function test_the_countries_page_displays_seeded_countries(): void
    {
        $this->seed(\Database\Seeders\CountrySeeder::class);

        $response = $this->get('/countries');

        $response->assertSee('Germany');
        $response->assertSee('France');
        $response->assertSee('Italy');
    }

    public function test_a_country_can_be_marked_as_great(): void
    {
        $country = Country::create(['name' => 'Germany', 'is_great' => false]);

        $this->assertFalse($country->is_great);

        $response = $this->post("/countries/{$country->id}/toggle-great");

        $response->assertRedirect('/countries');
        $this->assertTrue($country->fresh()->is_great);
    }

    public function test_a_great_country_can_be_unmarked(): void
    {
        $country = Country::create(['name' => 'Germany', 'is_great' => true]);

        $this->assertTrue($country->is_great);

        $response = $this->post("/countries/{$country->id}/toggle-great");

        $response->assertRedirect('/countries');
        $this->assertFalse($country->fresh()->is_great);
    }
}
