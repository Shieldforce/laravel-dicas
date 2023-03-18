<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"                  => ["string"],
            "email"                 => [
                "email",
                Rule::unique("users")->ignore($this->user->id)
            ],
            "password"              => ["string", "min:4"],
        ];
    }
}
