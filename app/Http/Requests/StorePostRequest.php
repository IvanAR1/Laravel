<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:1',
            'category' => 'required|string|min:3|max:50',
            'slug'=> 'required|string|min:3|max:50|unique:posts,slug',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array{
        return [
            'title' => 'título',
            'description' => 'descripción',
            'category' => 'categoría',
            'slug' => 'slug',
        ];
    }
}