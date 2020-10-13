<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wish;

class WishesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * A contact an be added test.
     *
     * @return void
     */
    public function a_wish_can_be_added()
    {
     $this->withoutExceptionHandling();
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
     * A contact can be retrieved test
     */

     public function a_wish_can_be_retrieved(){
            $wish =  Wish::factory()->create();
            $response = $this->get('/api/wishes/'.$wish->id);

            $response->assertJson([
                'name' =>$wish->name,
                'wish' => $wish->wish
            ]);
     }
    /**
     * @test
     * 
     * A contact can be patched test
     */

     public function a_wish_can_be_patched(){
            $wish =  Wish::factory()->create();

            $response = $this->patch('/api/wishes/'.$wish->id,$this->data());

            // get fresh copy of wish
           $wish =   $wish->fresh();

            $this->assertEquals('Nathaniel',$wish->name);
            $this->assertEquals('Stay alive',$wish->wish);
            
     }


    /**
     * @test
     * 
     * A contact can be deleted test
     */

     public function a_wish_can_be_deleted(){
            $wish =  Wish::factory()->create();

            $response = $this->delete('/api/wishes/'.$wish->id);

           $this->assertCount(0,Wish::all());
     }


     private function data(){
         return [
             'name' => 'Nathaniel',
             'wish' => 'Stay alive'
         ];
     }
}
