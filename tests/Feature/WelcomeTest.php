<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function can_not_access_welcome_page_without_pin()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('welcome'));
        $response->assertStatus(302);
        $response->assertRedirect(route('pin.create'));
    }
}
