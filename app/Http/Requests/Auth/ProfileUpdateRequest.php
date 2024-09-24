<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'gender' => ['sometimes', 'max:20'],
            'phone'    => ['sometimes', 'string', 'unique:users,phone', 'digits_between:10,20'],
            'email'    => ['required', 'string', 'email', 'unique:users,email,' . $this->user()->id],
            'birth_date' => ['required', 'date', 'date_format:Y-m-d'],
            'image' => ['image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
        ];
    }
}
