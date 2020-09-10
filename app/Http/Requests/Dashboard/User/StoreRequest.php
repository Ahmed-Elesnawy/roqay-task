<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'name'     => ['required','max:255'],
            'email'    => ['required','email','unique:users','max:255'],
            'password' => ['required','min:3','confirmed'],
            'address'  => ['required','array']
        ];
    }
}
