<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_transaction()
    {
        $response = $this->post('/transferMoney', [
            
            'user_id' => '2',
            'currency' => 'USD',          
            'amount' => '20'          
        ]);
        $response->assertStatus(200);
    }
}
