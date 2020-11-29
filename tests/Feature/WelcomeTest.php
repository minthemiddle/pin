<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function can_not_access_welcome_page_without_pin()
    {
        $response = $this->get(route('welcome'));
        $response->assertStatus(302);
        $response->assertRedirect(route('pin.create'));
        $response->assertSessionHas('status', 'rejected');
    }

    /** @test */
    public function can_access_welcome_page_after_entering_correct_pin() {
        Config::set('settings.PIN', 'test1234');
        $response = $this->post(route('pin.store', [
            'pin' => 'test1234',
        ]));
        $response->assertRedirect(route('welcome'))->assertSessionHas('status', 'allowed');
    }
}
