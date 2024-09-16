<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <a class="header-group" href="{{ route('tasksView') }}">
                {{ __('My Tasks') }}
        </x-slot>
        <div style="margin-left: 80px; margin-top: 10px">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            @endif
            @if (session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
            @if (session()->has('delete'))
                <div>
                    {{session('delete')}}
                </div>
            @endif
        </div>
        <div class="inventory-area">
            My Tasks
        </div>
        <div class="table-group">
            <table border="1">
                <tr class="title-group">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority Level</th>
                    <th>Due Date</th>
                    <th>Assigned to</th>
                </tr>
                @foreach($tasks as $task)
                    <tr class="data-group">
                        <td>{{$task->id}}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{$task->priority_level}}</td>
                        <td>{{$task->due_date}}</td>
                        <td>{{$task->assigned_to}}</td>
                        <td>
                            <x-button class="butn">
                                <a href="{{route('tasksUpdate', ['task'=>$task])}}">
                                    Update
                                </a>
                            </x-button>
                            <x-button class="butn">
                                <form method="post" action="{{route('tasksDelete', ['task'=>$task])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="DELETE">
                                </form>
                            </x-button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="create">
            <x-button>
                <a href="{{route('tasksCreate')}}">
                    Create
                </a>
            </x-button>
        </div>
    </x-app-layout>
</body>
</html>