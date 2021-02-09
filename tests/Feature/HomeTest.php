<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
///  fontion pour tester  si la  page about  existe ou  non

    public function testExample()
    {
        $response = $this->get('/about');

        $response->assertSeeText('bonjour');//tester le contenu de la page
    }
}
