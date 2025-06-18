<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewWishlistRequest extends FormRequest
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
            'livery' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'livery.required' => 'We need to know, what to create.',
            'livery.max' => 'Sheesh, your text is too long, please shorten your request.'
        ];
    }
}
