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
        $connection = new Client("mongodb://localhost:27017");
        $this->collection = $connection->LaravelCRUD->task;
    }

    public function index()
    {
        $tasks = $this->collection->find();
        return view('task.index', ['tasks'=>$tasks]);
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request)
    {
        $this->collection->insertOne([
            'name' => $request->name
        ]);
        return redirect(route('task.index'));
    }
    public function show($task)
    {
        $task = $this->collection->findOne(['_id' => new ObjectId("$task")]);
        return view('task.show', ['task'=>$task]);
    }
    public function edit($task)
    {
        $task = $this->collection->findOne(['_id' => new ObjectId("$task")]);
        return view('task.edit', ['task'=>$task]);
    }

    public function update(Request $request, $task)
    {
        $this->collection->updateOne(
            ['_id' => new ObjectId("$task")],
            ['$set'=>['name'=>$request->name]]
        );
        return redirect(route('task.index'));
    }

    public function destroy($task)
    {
        $this->collection->deleteOne(['_id' => new ObjectId("$task")]);
        return redirect(route('task.index'));
    }
}
