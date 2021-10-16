<?php

namespace App\Http\Requests\common;

use Illuminate\Foundation\Http\FormRequest;

class Certificates extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "course_id" => "nullable|numeric",
            "model_id" => "nullable|numeric",
        ];
    }
}
