@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Tasks</h1><hr>
                <a href="{{Route('task.create')}}" class="btn btn-success">Add New</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <td><h3>ID</h3></td>
                        <td><h3>Name</h3></td>
                        <td colspan="3"><h3>Actions</h3></td>
                    </tr>
                </thead>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->_id}}</td>
                    <td>{{$task->name}}</td>
                    <td><a style="color:white" href="{{Route('task.edit',$task->_id)}}" class="btn btn-info" role="button">Modify</a></td>
                    <td><a style="color:white" href="{{Route('task.show',$task->_id)}}" class="btn btn-info" role="button">See</a></td>
                    <td>
                        <form action="{{route('task.destroy', $task->_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input
                                type="submit"
                                value="Delete"
                                class="btn btn-danger"
                            >
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
