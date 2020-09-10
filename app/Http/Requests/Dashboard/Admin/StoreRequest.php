<?php

namespace App\Http\Requests\Dashboard\Admin;

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

            'name'     => ['required','max:255','string'],
            'email'    => ['required','max:100','unique:admins'],
            'password' => ['required','min:5','confirmed'],
            'roles'    => ['required','array'],
        ];
    }
}
