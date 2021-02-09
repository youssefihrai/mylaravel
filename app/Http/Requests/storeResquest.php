<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeResquest extends FormRequest
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
        return
            ['matricule'=>'bail|required|min:4|max:100',
            'name'=>'required|min:6',
            'email'=>'required|email',
            'telephonne'=>'required|integer',


    ];
    }
}
