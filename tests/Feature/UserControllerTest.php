<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

class UserControllerTest extends TestCase
{
    public function test_user_index_get_endpoint(): void
    {
        // $users = User::factory()->create();
        // dd($users);
        $response = $this->getJson('/users');
        
        $response->assertJson(function (AssertableJson $json){
            //     dd($json);
            //     dd('$json');
            }
        );
        $response->assertStatus(200);
    }
    public function test_user_show_get_endpoint(): void
    {
        $response = $this->get('/users/1');
        $response->assertStatus(200);
    }
    public function test_user_store_post_endpoint(): void
    {
        $response = $this->post('/users');
        $response->assertStatus(201);
    }
    public function test_user_update_put_endpoint(): void
    {
        $response = $this->put('/users/1');
        $response->assertStatus(200);
    }
    public function test_user_destroy_delete_endpoint(): void
    {
        $response = $this->delete('/users/1');
        $response->assertStatus(204);
    }
}
