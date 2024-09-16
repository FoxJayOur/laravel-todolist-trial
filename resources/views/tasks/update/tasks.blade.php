<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <a class="header-group" href="{{ route('tasksView') }}">
                {{ __('My Tasks') }}
            </a>
        </x-slot>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        <form class="forms" method="post" action="{{route('tasksSave', ['task' => $task])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Title</label>
                <x-input type="text" name="title" placeholder="Title" value="{{$task->title}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" value="{{$task->description}}"/>
            </div>
            <div class="form-group">
                <div>
                    <label>Status: Current status is {{$task->status}}</label>
                </div>
                <x-label>Todo</x-label>
                <x-input type="radio" name="status" value="Todo"/>
                <x-label>In Progress</x-label>
                <x-input type="radio" name="status" value="In Progress"/>
                <x-label>Done</x-label>
                <x-input type="radio" name="status" value="Done"/>
            </div>
            <div class="form-group">
                <div>
                    <label>Priority Level: Current priority level is {{$task->priority_level}}</label>
                </div>
                <x-label>High</x-label>
                <x-input type="radio" name="priority_level" value="High"/>
                <x-label>Medium</x-label>
                <x-input type="radio" name="priority_level" value="Medium"/>
                <x-label>Low</x-label>
                <x-input type="radio" name="priority_level" value="Low"/>
                
            </div>
            <div class="form-group">
                <label>Due Date</label>
                <x-input type="date" name="due_date" placeholder="Due Date" value="{{$task->due_date}}"/>
            </div>
            <div class="form-group">
                <label>Assigned to</label>
                <x-input type="text" name="assigned_to" placeholder="Assigned to" value="{{$task->assigned_to}}"/>
            </div>
            <div class="form-group">
                <x-button>
                    <input type="submit" value="Save Item">
                </x-button>
            </div>
        </form>
    </x-app-layout>
</body>
</html>