<?php

namespace App\Services;

use App\Exceptions\ExceptionLogin;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public static function handle(LoginRequest $request)
    {
        $credentials = $request->only(["email", "password"]);

        if (!Auth::attempt($credentials)) {
            throw new ExceptionLogin("Credênciais incorretas!");
        }

        $user = $request->user();

        $user->tokens()->where("name", $request->client)->delete();

        $token = $user->createToken($request->client, []);

        return [
            "type_token"   => "Bearer",
            "access_token" => $token->plainTextToken,
            "user"         => $user,
        ];
    }
}