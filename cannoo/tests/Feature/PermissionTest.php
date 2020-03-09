<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class PermissionTest extends TestCase
{
    public function testViewProduct() {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');

        $response = $this->get('/product/show');

        $response->assertSuccessful();
        $response->assertViewIs('product.show');

    }

    public function testViewAnimals() {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');

        $response = $this->get('/animal/show');

        $response->assertSuccessful();
        $response->assertViewIs('animal.show');

    }
}
