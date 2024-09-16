<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $newTask = User::create($data);

        return redirect()->route('dashboard')->with('success','Task was stored in tasklist');
    }

    public function view() {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function update(User $user) {
        
        return view('users.index', ['user'=>$user]);
        
    }

    public function save(User $user, Request $request) {
        $data = $request->validate([
            'namee'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $user->update($data);

        return redirect()->route('usersView')->with('success','Updated Successfully');
    }
    
    public function delete(User $user) {
        $user->delete();

        return redirect()->route('usersView')->with('delete','Successfully Deleted');
    }
}
