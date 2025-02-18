<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Add student record in Validation also working//
    function create(Request $request){
        $rules = array(
            'name'=>'required|min:2|max:10',
            'email'=>'email|required',
            'number'=>'required',
            'father'=>'required|min:2|max:10'
        );
        $validation = Validator::make($request->all(),$rules);
        if($validation->fails()){
            return $validation->errors();
        }else{
            $student = new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->number=$request->number;
        $student->father=$request->father;
        if($student->save()){
            return "Student added successfull";
        }else{
            return "Student does not added ";
        }

    }
}
    //student record alos working //
    function update(Request $request){
        $student =Student::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->number=$request->number;
        $student->father=$request->father;
        if($student->save()){
            return "Student reocrd update";
        }else{
            return "Student reocrd not update";
        }
    }
    //student delete work done//
    function delete(Request $request,$id){
        
        $delete = Student::find($request->id);
        if($delete->delete()){
            return "record is delete";
        }else{
            return "Record not delete";
        }

    }
    //search working also done//
    function search($name){
        $search = Student::where('name','LIKE',"%$name%")->get();
        if($search){
            return $search;
        }else{
            return "Error";
        }
    }
}

