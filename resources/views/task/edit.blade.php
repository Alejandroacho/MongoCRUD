@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Task</h1>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{Route('task.update',$task->_id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$task->name}}"/>
                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </form>
            </div>
            <div class="card-footer">
                <a href="{{Route('task.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
