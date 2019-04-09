<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'phone' => 'required|numeric|digits_between:10,12',
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
