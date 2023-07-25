<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class registerTest extends TestCase
{
    use RefreshDatabase;
  
    public function test_user_can_be_registered()
    {
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'tuanegfgf4r3@example.com',
            'password' => 'passwordwe',
        ]);
 
        $this->assertDatabaseHas('users', [
            'email' => 'tuanegfgf4r3@example.com'
        ]);
    }

    public function test_user_can_not_be_registered_with_invalid_email()
    {
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'tuyyygffdv3dfdfd',
            'password' => 'passwordwe',
        ]);
 
        $this->assertDatabaseMissing('users', [
            'email' => 'tuyyygffdv3dfdfd'
        ]);

    }
    
    public function test_User_Creation_With_Valid_Data()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndrioie@example.com',
            'password' => 'password123',
        ];
        $user = User::create($userData);

    
        $this->assertInstanceOf(User::class, $user);
        
    }

    public function test_user_creation_with_invalid_data()
    {
        $this->expectException(\Exception::class);

        $response = $this->post('/api/register', [
            'name' => '',
            'email' => '',
            'password' => '',
        ]);
        
        $this->expectException(\Exception::class);

        User::create($invalidUserData);
        
    }
}
