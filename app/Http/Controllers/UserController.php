<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view('home');
    }
    function signup(Request $request)
    {
        // $father = json_decode($request->input('posts', '[{"first_name":"Arif"},{"last_name":"hanif"}]'));
        // $phones = json_decode($request->input('phones', '["03421126921","03532219871"]'), true);
        // dd($father,$phones, $input);
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] = $user->createToken('myapp')->plainTextToken;

        $user['name'] = $user->name;

        // dd($user);
        return redirect(route('category-index'));
        // return ['success'=>true,'result'=>$success,'msg'=>"Registration successfull"];
    }

    public function register()
    {
        return view('registeration.registeration');
    }

    public function login()
    {
        return view('login.login');
    }

    public function logins(UserRequest $request)
    { {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('home');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        // $valiation = $request->validate();
        // $login = User::where('email',$request->input('email'))->first();
        // if(!$login || !hash::check($request->input('password'),$login->password)){
        //     return response()->json(['error'=>'invalid email or password']);
        // }

        // return view('Extension.create');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login-page'));
    }
}
