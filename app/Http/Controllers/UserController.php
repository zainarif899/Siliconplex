<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function signup(Request $request){
        // $father = json_decode($request->input('posts', '[{"first_name":"Arif"},{"last_name":"hanif"}]'));
        // $phones = json_decode($request->input('phones', '["03421126921","03532219871"]'), true);
        // dd($father,$phones, $input);
        $input = $request->all();
        
        $input ['password']=bcrypt($input['password']);

        $user =User::create($input);

        $success ['token']=$user->createToken('myapp')->plainTextToken;
        
        $user['name']=$user->name;
        
        // dd($user);
        return redirect(route('category-index'));
        // return ['success'=>true,'result'=>$success,'msg'=>"Registration successfull"];
    }

    public function register(){
        return view('registeration.registeration');
    }

    public function login(){
        return view('login.login');
    }

    public function logins(UserRequest $request){
        // $valiation = $request->validate();
        $login = User::where('email',$request->input('email'))->first();
        if(!$login || !hash::check($request->input('password'),$login->password)){
            return response()->json(['error'=>'invalid email or password']);
        }

        return view('Extension.create');
    }

    // public function login(){
    //     $login =
    // }

    // function login(Request $request){
    //     $login = User::where()
    // }


    // {
    //     "id":1,
    //     "name":"Ahsans bhai",
    //     "email":"Ahsan.siliconplex@gmail.com",
    //     "number":"1234567",

    //     "father":"ahsan"
    //   }

    // $father = json_decode($request->input('father', '{"first_name":"Arif","last_name":"Hanif"}'), true);

    // $phone = json_decode($request->input('phone', '["03421126921","03532219871"]'), true);

    // $input = $request->all();

    // dd($father, $phone, $input);

}
