<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isEdit =  str_contains(request()->route()->uri(), 'update');
        return [
            "title" => ['required'],
            "slug" => ['required'],
            "body" => ['required'],
            "photo" => [!$isEdit ? 'required' : 'nullable', 'image'],
            "cat_id" => ['required', Rule::exists('categories', 'id')],
        ];
    }
}
