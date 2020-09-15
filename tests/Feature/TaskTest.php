<?php

namespace Tests\Feature;

use MongoDB\BSON\ObjectId;
use MongoDB\Client;
use Tests\TestCase;


class TaskTest extends TestCase
{
    public function testIndexApiFunctionReturnJson()
    {
        $response = $this->get('/api/task');
        $structure = ([[
            "name"
        ]]);
        $response->assertStatus(200);
        $response->assertJson([]);
        $response->assertJsonStructure($structure);
    }

    public function testApiCanCreateTask()
    {
        $data = ([
            'name' => 'TestTaskName'

        ]);
        $response = $this->post('/api/task',$data);
        $response->assertStatus(201);
        $response->assertJson([]);
    }
    public function testApiFindTaskById()
    {
        $collection = (new Client('mongodb://localhost:27017'))->LaravelCRUD->Tasks;
        $document = $collection->findOne(['name' => 'TestTaskName']);
        $response = $this->get("/api/task/$document->_id");
        $response->assertStatus(200);
        $response->assertJson(['name'=>'TestTaskName']);
    }

    public function testApiUpdateChanges()
    {
        $collection = (new Client('mongodb://localhost:27017'))->LaravelCRUD->Tasks;
        $document = $collection->findOne(['name' => 'TestTaskName']);
        $data = ['name'=>'Osito Yogui'];
        $response = $this->put("/api/task/$document->_id",$data);
        $response->assertStatus(200);
        $response->assertJson(['name'=>'Osito Yogui']);

    }

    public function testApiDeleteOne()
    {
        $collection = (new Client('mongodb://localhost:27017'))->LaravelCRUD->Tasks;
        $document = $collection->findOne(['name' => 'Osito Yogui']);
        $response = $this->delete("/api/task/$document->_id");
        $response->assertStatus(200);
    }

}
