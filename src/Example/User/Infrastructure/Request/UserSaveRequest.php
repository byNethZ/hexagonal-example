<?php

namespace Src\Example\User\Infrastructure\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\Example\User\Domain\Exceptions\UserException;
use Src\Example\User\Infrastructure\Helpers\StringHelper;

final class UserSaveRequest extends FormRequest
{
    use StringHelper;

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El campo username es requerido',
            'last_name.required' => 'El campo last_name es requerido',
            'first_name.required' => 'El campo first_name es requerido',
            'email.required' => 'El campo email es requerido',
            'password.required' => 'El campo password es requerido',
            'email.unique' => 'El email ya se encuentra registrado',
            'email.email' => 'El email no es válido',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new UserException($this->formatErrorRequest($validator->errors()->all()), 422);
    }
}