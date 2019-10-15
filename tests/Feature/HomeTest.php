<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->actingAs($this->user())
        ->get('/');

        $response->assertSeeText('Wilkomen');
        $response->assertSeeText('Hello this is welcome');
    }

    public function testContactPageIsWorkingCorrectly(){

        $response = $this->get('/contact');

        $response->assertSeeText('Contact');
        $response->assertSeeText('Hello this is contact');
    }
}
