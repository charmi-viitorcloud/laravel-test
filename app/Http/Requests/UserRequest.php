<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::check(); 

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string','regex:/^[a-zA-Z]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'dob' => ['required'],
        ];
    }
}
