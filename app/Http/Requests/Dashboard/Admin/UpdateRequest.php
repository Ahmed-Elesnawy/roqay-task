<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'    => ['required','max:100','unique:admins,email,'. $this->admin->id],
            'password' => ['nullable','min:5'],
            'roles'    => ['required','array'],
        ];
    }
}
