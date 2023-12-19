<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Nf;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

class NfControllerTest extends TestCase
{
    // public function __construct()
    // {
    //     // $this->user = User::factory()->create();
    // }
    // $response = $this->actingAs($user, 'api')
    //     ->json('post', '/api/lookup', [
    //         'email' => 'user@gmail.com'
    //     ]);

    // $response->assertStatus(200);
    // $response->assertJsonStructure([
    //     'info' => [
    //         'name'
    //     ]
    // ]);
    public function test_nf_index_get_endpoint(): void
    {
        $user = User::factory()->create(['password'=>'123456']);
        
        $response = $this->post('/auth/login', [
            'email' => $user->email,
            'password' => '123456'
        ]);
        dd($response);
        $response = $this->getJson('/nf');
        
        $response->assertJson(function (AssertableJson $json){
            }
        );
        $response->assertStatus(200);
    }
    public function test_nf_show_get_endpoint(): void
    {
        $response = $this->get('/nf/1');
        $response->assertStatus(200);
    }
    public function test_nf_store_post_endpoint(): void
    {
        $response = $this->post('/nf');
        $response->assertStatus(201);
    }
    public function test_nf_update_put_endpoint(): void
    {
        $response = $this->put('/nf/1');
        $response->assertStatus(200);
    }
    public function test_nf_destroy_delete_endpoint(): void
    {
        $response = $this->delete('/nf/1');
        $response->assertStatus(204);
    }
}
