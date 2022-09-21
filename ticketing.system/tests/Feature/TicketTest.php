<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
        public function setUp():void
        {
            parent::setUp();
            // $this->user=Ticket::factory()-create();
            $this->user=User::factory()->create();
            Sanctum::actingAs($this->user);

        }

        public function test_can_get_all_ticket_list()
        {
            Ticket::factory(10)->for($this->user)->create();
            $this->getJson('api/ticket')->assertJson([
                'data'=>[
    
                    [
                        'user_id'=>$this->user->id
                        
                    ]
                ]
                    ])
                    ->assertJsonCount(10,'data');
        }

        public function test_user_can_create_new_ticket()
        {
            $ticket=Ticket::factory()->make();

            $this->postJson('api/ticket',$ticket->toArray())
            ->assertJson([
                'data'=>[
                    'user_id'=>$this->user->id,
                    'title'=>$ticket->title
                ]
                ]);
        }

        public function test_user_can_update_existing_ticket(){
            $ticket=Ticket::factory()->for($this->user)->create(['title'=>'rawrrrrrrr']);

            $this->putJson('api/ticket/'.$ticket->id,[
                'title'=>'meow'
            ])
            ->assertJson([
                'data'=>[
                    'title'=>'meow'
                ]
                ]);
    
                $this->assertDatabaseHas(Ticket::class,[
                    'user_id'=>$this->user->id,
                    'title'=>'meow'
                ]);
        }

        public function test_user_can_view_existing_ticket(){
            $ticket = Ticket::factory()->for($this->user)->create();

            $this   ->getJson('api/ticket/' . $ticket->id)
                    ->assertJson([
                        "data" => [
                            "user_id" => $this->user->id
                        ]
                    ]);
        }

        public function test_user_can_delete_existing_ticket(){
            $ticket=Ticket::factory()->for($this->user)->create();
            $this->deleteJson('api/ticket/' .$ticket->id)->assertStatus(204);
    
            $this->assertDatabaseMissing(Ticket::class,[
                'user_id'=>$this->user->id,
                'title'=>$ticket->title
            ]);
        }

}
