<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordTest extends TestCase
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

    
    public function testSetUp()
    {
        // generate two languages
        factory(Language::class)->create([
            'id' => '1'
        ]);
        factory(Language::class)->create([
            'id' => '2'
        ]);

        // generate 5 words belonging to two different languages
        factory(Word::class, 3)->create([
            'language_id' => '1'
        ]);
        factory(Word::class, 2)->create([
        'language_id' => '2'
        ]);
    }
}
