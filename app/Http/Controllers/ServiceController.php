<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Http\Requests\ServicePostRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('service.index',compact('services'));
    }

    public function create(){
        return view('service.create');
    }

    public function show(Request $request,$id){
        $services = Service::findOrFail($id);
       return view('service.show',compact('services'));
    }

    public function store(ServicePostRequest $request){
        $validated = $request->validated();
        $validated = $request->safe()->only(['names', 'description']);
        
        $service = Service::create($request->all());
        if($service){
            return redirect(route('service-index'));
        }else{
            return $service->error();
        }
    }

    public function edit($id)
    {  
        $service = Service::findOrFail($id);
        return view('service.edit',compact('service'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'names'=>'required',
            'description'=>'required'
        ]);
        $update = Service::findOrFail($id);
        $update->update([
            'names'=>$request->names,
            'decsription'=>$request->decsription,
        ]);
        return redirect(route('service-index'));
    }

    public function delete(Request $request,$id)
    {        
        $delete = Service::find($request->id);
        if($delete->delete()){
            return redirect(route('service-index'));
        }else{
            return "Record not delete";
        }
    }
}
