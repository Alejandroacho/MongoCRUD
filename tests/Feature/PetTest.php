<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetTest extends TestCase
{
    public function testIndexApiFunctionReturnJson()
    {
        $response = $this->get('/api/pet');
        $structure = ([[
                "name",
                "profilePic",
                "instagram",
                "twitter"
        ]]);
        $response->assertStatus(200);
        $response->assertJson([]);
        $response->assertJsonStructure($structure);
    }

}
