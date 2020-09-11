<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use MongoDB\Client as Client;
use MongoDB\BSON\ObjectId as ObjectId;

class TaskController extends Controller
{
    function __construct ()
    {
        $this->connection = new Client("mongodb://localhost:27017");
    }

    public function index()
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $tasks = $collection->find();
        return view('task.index', ['tasks'=>$tasks]);
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request)
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $collection->insertOne([
            'name' => $request->name
        ]);
        return redirect(route('task.index'));
    }
    public function show($task)
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $task = $collection->findOne(['_id' => new ObjectId("$task")]);
        return view('task.show', ['task'=>$task]);
    }
    public function edit($task)
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $task = $collection->findOne(['_id' => new ObjectId("$task")]);
        return view('task.edit', ['task'=>$task]);
    }

    public function update(Request $request, $task)
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $collection->updateOne(
            ['_id' => new ObjectId("$task")],
            ['$set'=>['name'=>$request->name]]
        );
        return redirect(route('task.index'));
    }

    public function destroy($task)
    {
        $collection = $this->connection->LaravelCRUD->Tasks;
        $collection->deleteOne(['_id' => new ObjectId("$task")]);
        return redirect(route('task.index'));
    }
}
