<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeveloperTest extends TestCase
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
            $user=User::factory()->create();
            Sanctum::actingAs($user);
        }

    public function can_get_all_category_list()
    {
       
        // $cat = Category::factory(10)->create();

        // $this->getJson('api/category')
        //         ->assertJson([
        //             'category_type'=>'adnexio'
        //         ]);
        
        $response=$this->getJson('api/developer/category')->assertStatus(200);
 
    }

    public function test_create_new_category()
    {
        $cat=Category::factory()->make();

        $this->postJson('api/developer/category',$cat->toArray())
        ->assertJson([
            'category_type'=>$cat->category_type
        ]);
    }

    public function test_dev_edit_existing_category()
    
    {
        
        $cat=Category::factory()->create([
            'category_type'=>'testttttttt'
        ]);
        $this->putJson('api/developer/category/'.$cat->id,[
            'category_type'=>'meow'
        ])
        ->assertJson([
            'category_type'=>'meow'
        ]);

        $this->assertDatabaseHas(Category::class,[
            'category_type'=>'meow'
        ]);
    }
    public function test_dev_can_view_existing_category(){
        $cat = Category::factory()->create();

        $this   ->getJson('api/developer/category/' . $cat->id)
                ->assertJson([
                    'category_type'=>$cat->category_type
                ]);
    }


    public function test_dev_can_delete_existing_category(){
        $cat=Category::factory()->create();
        $this->deleteJson('api/developer/category/' .$cat->id)->assertStatus(204);

        $this->assertDatabaseMissing(Category::class,[
            'id'=>$cat->id
        ]);
    }

}
