<?php

namespace App\Http\Controllers;

use App\Models\TaskApi;
use Illuminate\Http\Request;
use App\Models\MongoDB;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

class TaskApiController extends Controller
{
    public function __construct()
    {
        $this->connection = MongoDB::connect();
        $this->collection = $this->connection->LaravelCRUD->Tasks;
    }

    public function index()
    {
        $collections = $this->collection->find();
        $allPets = [];
        foreach($collections as $petsCollection)
        {

             $allPets[]= $petsCollection;
        }
        return response()->json($allPets,200);
    }

    public function store(Request $request)
    {

        $pet = $this->collection->insertOne($request->all());
        return response()->json($pet,201);

    }

    public function show($id)
    {
        $pet = $this->collection->findOne(['_id' => new ObjectId("$id")]);
        return response()->json($pet,200);
    }


    public function update(Request $request, $id)
    {
       $this->collection->updateOne
       (
            ['_id' => new ObjectId("$id")],
            ['$set'=>$request->all()]
        );
        $pet = $this->collection->findOne(['_id' => new ObjectId("$id")]);
       return response()->json($pet,200);
    }

    public function destroy($id)
    {
        $this->collection->deleteOne(['_id' => new ObjectId("$id")]);
        return response()->json('Removed',200);
    }
}
