@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Tasks</h1><hr>
                <a href="#" class="btn btn-secondary">Add New</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <td><h3>ID</h3></td>
                        <td><h3>Name</h3></td>
                    </tr>
                </thead>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->_id}}</td>
                    <td>{{$task->name}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
