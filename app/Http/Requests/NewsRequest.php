<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|max:1',
            'article' => ['required', 'string'],
            'user_id' => 'required|digits:1'
        ];
    }

    public function messages()
    {
        return [
            'title.max' => "не может быть больше 1",
            'article.required' => "обязательно"
        ];
    }
}
