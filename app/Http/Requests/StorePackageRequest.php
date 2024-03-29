<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'price'=>'required|numeric',
            'credits'=>'required|numeric',
            'title'=>'required|max:255',
            'description'=>'nullable|max:2000',
            'status'=>'required|max:255'
        ];
    }
}
