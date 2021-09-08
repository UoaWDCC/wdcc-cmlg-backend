<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;



class UserTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        factory(User::class)->create([
            'id' => '1',
            'name' => 'aaa',
            'password' => '123'
        ]);
    }


    public function testUserValidate()
    {
        $response = $this->get('/api/login?username=aaa&password=a123');

        $response
            ->assertStatus(200)
            ->assertJson(["verified"=>true]);
    }
}
