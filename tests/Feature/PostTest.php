<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    ////tester l'insertion
    public function testpost(){
    $Post=new Post();
    $Post->title="title1";
      $Post->content="content1";
      $Post->active=true;
      $Post->slug=Str::slug( $Post->content,'-');  
      $Post->save();
      $this->assertDatabaseHas('posts',[
          'title'=>'title1'
      ]
      );
}
// tester  l'inertion la redirection et la session
public function testpostvalidate(){
    $data =[
        'title'=>'title1',
        'content'=>'content',
        'slug'=>Str::slug('content','-'),
        'active'=>false
    ];/// remplir data
        $this->post('/post',$data)// la pérsistance data  et  tester la redirection
        ->assertStatus(302)//tester la redirection
        ->assertSessionHas('status') // tester la création de   la session
        ->assertEquals(session('status'),'this post was  created');
        ;

}


}
