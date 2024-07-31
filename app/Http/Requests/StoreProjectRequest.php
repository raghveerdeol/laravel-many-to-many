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
            'title' => ['required', 'min:4', 'max:40'],
            'language' => ['required', 'min:3', 'max:60'],
            'technologies' => ['required', 'array', 'exists:technologies,id'],
            'content' => ['required'],
            'started_on' => ['required', 'date'],
            'finished' => ['required', 'boolean'],
            'image_url' => ['required', 'url'],
            'website_url' => ['required', 'url'],
            'type_id' => ['required', 'integer', 'exists:types,id']
        ];
}
}
