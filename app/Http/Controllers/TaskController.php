<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use MongoDB\Client as Client;
use MongoDB\BSON\ObjectId as ObjectId;

class TaskController extends Controller
{
    public function index()
    {
        $collection = (new Client)->LaravelCRUD->Tasks;
        $tasks = $collection->find();
        return view('task.index', ['tasks'=>$tasks]);
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request)
    {
        $collection = (new Client)->LaravelCRUD->Tasks;
        $collection->insertOne([
            'name' => $request->name
        ]);
        return redirect(route('task.index'));
    }
    public function show($task)
    {
        $collection = (new Client)->LaravelCRUD->Tasks;
        $task = $collection->findOne(['_id' => new ObjectId("$task")]);
        return view('task.show', ['task'=>$task]);
    }
    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy($task)
    {
        $collection = (new Client)->LaravelCRUD->Tasks;
        $collection->deleteOne(['_id' => new ObjectId("$task")]);
        return redirect(route('task.index'));
    }
}
