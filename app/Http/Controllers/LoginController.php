<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(LoginRequest $request){
        $validated = $request->validated();

        $userInfo = User::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('hasAdminRole', $userInfo->has_admin_role);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail', 'Incorrect Password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/admin/showloginform');
        }
    }

    public function dashboard()
    { 
        $data = User::all();

        return view('admin.dashboard', compact('data'));
    }
}
