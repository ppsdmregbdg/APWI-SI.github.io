<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Alert;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.admins.edit-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        Alert::success('Congrats', 'Change Password Successfully!');
        return redirect('dashboard.admins.editPassword');
    }
}
