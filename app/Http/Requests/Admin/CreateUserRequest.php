<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|digits_between:10,12',
            'role' => [
                'required',
                Rule::in(2,3),
            ],
            'avatar' => 'image|max:4096',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'admin email',
            'avatar' => 'admin avatar'
        ];
    }
}
