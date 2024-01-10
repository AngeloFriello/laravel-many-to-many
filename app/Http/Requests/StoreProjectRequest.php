<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string|unique:projects',
            'bio' => 'nullable|min:5|string',
            'type_id' => 'nullable|exists:types,id',
            'admin' => 'nullable|min:5|max:50|string',
            'thumb' => 'nullable|string',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
