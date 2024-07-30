<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user_cannot_create_student()
   {
    $response = $this->post('/register', [
        'name' => 'Roni',
        'email' => 'roni@user.com',
        'password' => 'roni1234',
        'password_confirmation' => 'roni1234',
        'role' => 'member'
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'roni@user.com'
    ]);

    $user = User::where('email', 'roni@user.com')->first(); 

    $this->actingAs($user);

    $response2 = $this->get('/create');
    $response2->assertStatus(403);
   }

   public function test_admin_can_create_student()
   {
    $response = $this->post('/register', [
        'name' => 'Vanya',
        'email' => 'vanya@user.com',
        'password' => 'vanya1234',
        'password_confirmation' => 'vanya1234',
        'role' => 'admin'
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'vanya@user.com'
    ]);

    $this->assertDatabaseMissing('users', [
        'email' => 'gholy@user.com'
    ]);

    $user = User::where('email', 'vanya@user.com')->first(); 

    $this->actingAs($user);

    $response2 = $this->get('/create');
    $response2->assertStatus(200);
   }
}
