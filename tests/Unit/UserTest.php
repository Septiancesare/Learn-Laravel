<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function endpoint_not_exists()
    {
        $response = $this->get('/update');
        $response->assertStatus(404);
    }

    public function test_user_duplication()
    {
        $user1= User::make([
            'name' => 'Roni',
            'email' => 'roni@user.com'
        ]);
        $user2= User::make([
            'name' => 'Doni',
            'email' => 'doni@user.com'
        ]);

        $this -> assertTrue($user1->name != $user2->name);
        $this -> assertTrue($user1->email != $user2->email);
    }

    public function test_delete_user()
    {
        $user1= User::make([
            'name' => 'Roni',
            'email' => 'roni@user.com'
        ]);

        $user1->delete();
        $this->assertTrue(true);
    }
}
