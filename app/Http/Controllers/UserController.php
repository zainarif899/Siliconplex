<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function signup(Request $request){
        $input = $request->all();
        $input ['password']=bcrypt($input['password']);
        $user =User::create($input);
        $success ['token']=$user->createToken('myapp')->plainTextToken;
        $user['name']=$user->name;
        return ['success'=>true,'result'=>$success,'msg'=>"Registration successfull"];
    }

    // function login(Request $request){
    //     $login = User::where()
    // }
}
