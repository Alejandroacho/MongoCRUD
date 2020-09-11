<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use MongoDB\Driver\Manager as Manager;
use MongoDB\Driver\Command as Command;
use MongoDB\Driver\Query as Query;

class TaskController extends Controller
{
    public function index()
    {
        $connection = new Manager("mongodb://localhost:27017");
        $query = new Query([]);
        $data = $connection->executeQuery("LaravelCRUD.Tasks", $query);
        $tasks = $data->toArray();
        return view('task.index', ['tasks'=>$tasks]);

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Task $task)
    {
        //
    }
    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}
