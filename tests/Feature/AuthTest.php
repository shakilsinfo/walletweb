<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_successfully_login()
    {
        
        $response = $this->post('user/login', [
            
            'email' => 'john@gmail.com',
            'password' => '123456'          
        ]);
        $response->assertRedirect('/dashboard');
    }

    public function test_successfully_logout()
    {
        
        $response = $this->get('user/logout');
        $response->assertRedirect('/');
    }
}
