<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'name_instractor' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
    }
}
