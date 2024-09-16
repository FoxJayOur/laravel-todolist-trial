<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('tasks') }}" :active="request()->routeIs('tasks')">
                    {{ __('My Tasks') }}
                </a>
            </h2>
        </x-slot>
        <div class="row">
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <a href="{{route('tasksView')}}">
                        <h4><b>Work Tasks</b></h4>
                        <p>Code a todo-list application!</p>
                    </a>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Others task</b></h4>
                    <p>programming, designing, building, etcetera</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Others task</b></h4>
                    <p>programming, designing, building, etcetera</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Others task</b></h4>
                    <p>programming, designing, building, etcetera</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Others task</b></h4>
                    <p>programming, designing, building, etcetera</p>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>