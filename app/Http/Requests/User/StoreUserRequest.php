<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"                  => ["required", "string"],
            "email"                 => ["required", "email", "unique:users"],
            "password"              => ["required", "string", "min:4", "confirmed"],
            "password_confirmation" => ["required", "string", "min:4",],
            "client"                => ["required", "in:postman,client"],
        ];
    }
}
