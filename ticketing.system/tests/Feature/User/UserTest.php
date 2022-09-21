<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_user_list()
    {
        // make request
        $respone=$this->getJson('api/user');

        // to check respone
        $respone->assertStatus(200);

    }

    public function test_register_user()
    {
        $user=User::factory()->make()->toArray();
        // dd($teacher);
        $respone=$this->postJson('api/user',[
            'name'=>$user ['name'],
            'email'=>$user ['email'],
            'password'=>'mewmewm',
            'role'=>'developer'
        ]);

        $respone->assertOk();

        $this->assertDatabaseHas(User::class,[
            'name'=>$user ['name'],
            // 'name'=>$user ['email'],
        ]);
    }
}
