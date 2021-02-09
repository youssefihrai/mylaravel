<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
/// création de votre propos validation des donnéés
// bail indique  que  si la premiere  cas de validation pas
// la peine de voir le deuxiéme  validate

     public function rules()
    {
        return 
            ['title'=>'bail|required|min:4|max:100',
            'content'=>'required',
            'picture'=>'image|mimes:jpeg,jpg|max:1024'
    ];
        
    }
}
