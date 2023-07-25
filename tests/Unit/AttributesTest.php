<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttributesTest extends TestCase
{
    use RefreshDatabase;
    
     public function test_Name_Is_Mass_Assignable()
    {
        $userData = [
            'name' => 'Shdhf fbffn',
            'email' => 'fghrej@example.com',
            'password' => 'password123',
        ];

        $user = new User($userData);

        $this->assertEquals($userData['name'], $user->name);
    }

    public function test_Password_Is_Mass_Assignable()
    {
        $userData = [
            'name' => 'Shdhf fbffn',
            'email' => 'fghrej@example.com',
            'password' => 'password123',
        ];

        $user = new User($userData);

        $this->assertEquals($userData['password'], $user->password);
    }

    public function testUserCanBeDeleted()
    {
        $user = User::factory()->create();

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
  
}
