<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Constant\Constant;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Constant::STATUS_TRUE;
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
            'dob' => ['required'],
        ];
    }
}
