<?php

namespace App\Http\Requests;

use App\Constant\Constant;
use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.p
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
        ];
    }
}