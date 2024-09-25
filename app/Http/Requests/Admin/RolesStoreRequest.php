<?php

namespace App\Http\Requests\Admin;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class RolesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->can('edit settings')) {
            return true;
        };
        return false;
    }

    public function failedAuthorization(){
        throw new AuthorizationException(__('auth.admins only, Unauthorized'));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'permissions' => ['required'],
            'permissions.*' => ['exists:permissions,name'],
            'role' => ['required', 'unique:roles,name', 'max:60']
        ];
    }
}
