<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends CreateUserRequest
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
        $rules = array_merge(parent::rules(), [
            'email' => 'required|email:rfc,dns|unique:users,email,'.request()->id,
        ]);
        
        if (!request()->has('password')) {
            unset($rules['password']);
        }

        return $rules;
    }
}
