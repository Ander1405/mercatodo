<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'same:confirm-password',
            'surname' => ['required', 'string'],
            'document'=> ['required', 'string'],
            'phone_number' => ['required', 'string'],
//            'roles' => 'required'
        ];
    }
}
