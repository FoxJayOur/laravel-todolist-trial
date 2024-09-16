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
            <a class="header-group" href="{{ route('usersView') }}">
                {{ __('My Users') }}
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
        <form class="forms" method="post" action="{{route('usersSave', ['user' => $user])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>name</label>
                <x-input type="text" name="name" placeholder="Name" value="{{$user->name}}"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <x-input type="text" name="email" placeholder="Email" value="{{$user->email}}"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <x-input type="date" name="password" placeholder="Password" value="{{$user->password}}"/>
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