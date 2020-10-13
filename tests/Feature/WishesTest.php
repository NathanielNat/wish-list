<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wish;
use App\Models\User;

class WishesTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    protected function setup():void
  {

    parent::setup();

    $this->user = User::factory()->create();

  }

      /**
     * @test
     * A unauthenticated user redirection.
     *
     * @return void
     */
   public function unauthenticated_user_should_be_rediercted_to_login(){
       
    $response =  $this->post('/api/wishes', array_merge($this->data(),['api_token' => '']));
    // $response =  $this->post('/api/wishs', \array_merge($this->data(),['api_token' => '']));
    $response->assertRedirect('/login');

    $this->assertCount(0, Wish::all());
 }


    
      /**
     * @test
     * A unauthenticated user redirection.
     *
     * @return void
     */
   public function a_list_of_wishes_can_be_fetched_for_authenticated_user(){
    $user  = User::factory()->create();

    $anotherUser  = User::factory()->create();

    $wish =  Wish::factory()->create(['user_id'=> $user->id]);
    $anotherWish =  Wish::factory()->create(['user_id'=> $anotherUser->id]);

    $response = $this->get('/api/wishes?api_token='. $user->api_token ); 

    $response->assertJsonCount(1)->assertJson([['id' =>$wish->id]]);
    }


    /**
     * @test
     * A wish an be added test.
     *
     * @return void
     */
    public function an_authenticated_user_can_add_wish()
    {
     $this->withoutExceptionHandling();
     $user  = User::factory()->create();
        $response = $this->post('/api/wishes',$this->data());

        $wish = Wish::first();
        $this->assertEquals('Nathaniel',$wish->name);
        $this->assertEquals('Stay alive',$wish->wish);
        // $this->assertCount(1,Wish::all());
        // $response->assertStatus(200);
    }

    /**
     * @test
     * 
     * A wish can be retrieved test
     */

     public function a_wish_can_be_retrieved(){
            $wish =  Wish::factory()->create(['user_id' => $this->user->id]);
            $response = $this->get('/api/wishes/'.$wish->id.'?api_token='.$this->user->api_token);

            $response->assertJson([
                'name' =>$wish->name,
                'wish' => $wish->wish
            ]);
     }
    /**
     * @test
     * 
     * Only a user's wish can be retrieved test
     */

     public function only_a_users_wish_can_be_retrieved(){
            $wish =  Wish::factory()->create(['user_id' => $this->user->id]);
            $anotherUser  = User::factory()->create();
            $response = $this->get('/api/wishes/'.$wish->id.'?api_token='.$anotherUser->api_token);

            $response->assertStatus(403);
     }
    /**
     * @test
     * 
     * A wish can be patched test
     */

     public function a_wish_can_be_patched(){
            $wish =  Wish::factory()->create(['user_id' => $this->user->id]);

            $response = $this->patch('/api/wishes/'.$wish->id,$this->data());

            // get fresh copy of wish
           $wish =   $wish->fresh();

            $this->assertEquals('Nathaniel',$wish->name);
            $this->assertEquals('Stay alive',$wish->wish);
            
     }


    /**
     * @test
     * 
     * A wish can be patched test
     */

     public function only_owner_of_wish_can_patch_wish(){
            $wish =  Wish::factory()->create();

            $anotherUser  = User::factory()->create();

            $response = $this->patch('/api/wishes/'.$wish->id,array_merge($this->data(),[$anotherUser->api_token]));

          $response->assertStatus(403); 
     }


    /**
     * @test
     * 
     * A wish can be deleted test
     */

     public function a_wish_can_be_deleted(){

            $wish =  Wish::factory()->create(['user_id'=> $this->user->id]);

            $anotherUser  = User::factory()->create();

            $response = $this->delete('/api/wishes/'.$wish->id, ['api_token' => $anotherUser->api_token]);

            $response->assertStatus(403); 
     }
     
     /**
     * @test
     * 
     * Only owner of a wish can deleted wish
     */

     public function only_owner_of_wish_can_delete_wish(){
            $wish =  Wish::factory()->create(['user_id'=> $this->user->id]);
            $anotherUser  = User::factory()->create();

            $response = $this->delete('/api/wishes/'.$wish->id, ['api_token' => $this->user->api_token]);

           $this->assertCount(0,Wish::all());
     }


     private function data(){
         return [
             'name' => 'Nathaniel',
             'wish' => 'Stay alive',
             'api_token' => $this->user->api_token,
         ];
     }
}
