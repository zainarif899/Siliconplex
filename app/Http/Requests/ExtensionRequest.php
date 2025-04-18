<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg|max:4096',
            'price'=>'required'
        ];
    }

    // public function setSlugAttribute(){
    //     $this->attributes['slug'] = str_slug($this->name  , "-");
    // }

    
}
