@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{$task->name}}</h1><hr>
            </div>
            <h2>ID:</h2><p>{{$task->_id}}</p>
            <h2>Name:</h2><p>{{$task->name}}</p>
        </div>
        <div class="card-footer">
            <a href="{{Route('task.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
