<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8|max:12',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->has_admin_role = $request->has_admin_role == 'on' ? 1 : 0 ;
        $user->registerated_date = Carbon::now()->toDateString();
        $save = $user->save();

        if($save){
            return redirect('/admin/dashboard')->with('success', 'New User Created');
        }else{
            return back()->with('fail', 'Something went wrong');
        }


    }
  
}
