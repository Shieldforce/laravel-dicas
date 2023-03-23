<?php

namespace App\Http\Requests\User;

use App\Models\Role;
use App\Services\HasRoleService;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roles_ids = "";
        if(HasRoleService::handle(request()->user(), "Super Admin")) {
            $roles_ids = implode(",", Role::pluck("id")->toArray());
        }
        return [
            "name"                  => ["required", "string"],
            "email"                 => ["required", "email", "unique:users"],
            "password"              => ["required", "string", "min:4", "confirmed"],
            "password_confirmation" => ["required", "string", "min:4",],
            "client"                => ["required", "in:postman,client"],
            "roles_ids"             => ["required", "array", "in:{$roles_ids}"],
        ];
    }

    public function messages()
    {
        return [
            "roles_ids.in" => "Esse id não é permitido!"
        ];
    }
}
