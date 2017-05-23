<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|unique:source,phone|digits_between:10,10',
            'email' => 'email|required|unique:source,email',
            'type' => 'required',
           ];
    }

    public function save(){
        $source  = Source::create([
            'name' => request('name') ,
            'company_name'=>request('cmpny_name'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'type'=>request('type')
        ]);
        return $source;
    }
}
