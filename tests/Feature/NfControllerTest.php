<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Nf;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;
//seeder
use Database\Seeders\tests\NfSeeder;
use Database\Seeders\tests\UserSeeder;

class NfControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Nf::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->seed(UserSeeder::class);
        $this->seed(NfSeeder::class);
        //login user test
        $response = $this->postJson('/auth/login', [
            'email' => 'tester@email.com',
            'password' => '123456'
        ]);
        $response->assertStatus(200);
        $this->token = $response->original['authorisation']['token'];
    }
    public function tearDown(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Nf::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');        
    }
    public function test_nf_index_get_endpoint(): void
    {
        $responseNf = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token,
        ])->getJson('/nf');

        $responseNf->assertJsonCount(2, 'data');
        $responseNf->assertStatus(200);
    }
    public function test_nf_show_get_endpoint(): void
    {
        $responseNf = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token,
        ])->getJson('/nf/1');

        $responseNf->assertStatus(200);
    }
    public function test_nf_store_post_endpoint(): void
    {
        $responseNf = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token,
        ])->postJson('/nf', [
            "nf_code"=>"100000000",
            "value"=>"0.20",
            "date_issue"=>"10/10/23",
            "sender_cnpj"=>"74065185000159",
            "sender_name"=>"é complicado", 
            "delivery_cnpj"=>"74065185000159",
            "delivery_name"=>"é 1 nada"
        ]);
        $responseNf->assertStatus(201);
    }
    public function test_nf_update_put_endpoint(): void
    {
        $responseNf = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token,
        ])->putJson('/nf/1', [
            "nf_code"=>"999999999",
            "value"=>"0.20",
            "date_issue"=>"10/10/23",
            "sender_cnpj"=>"74065185000159",
            "sender_name"=>"é complicado", 
            "delivery_cnpj"=>"74065185000159",
            "delivery_name"=>"é 1 nada"
        ]);

        $response = $this->put('/nf/1');
        $response->assertStatus(200);
    }
    public function test_nf_destroy_delete_endpoint(): void
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token,
        ])->delete('/nf/1');

        $response->assertStatus(204);
    }
}
