<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use Alert;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        Alert::success('Congrats', 'You have Successfully Registered');
        return redirect('/login');
    }
}
