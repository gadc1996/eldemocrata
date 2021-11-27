<?php 

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanLogin(): void
    {
        $credentials = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'secret'
        ];
        User::create($credentials);

        $this->post('/api/login', $credentials)
             ->assertOk();
    }
}
