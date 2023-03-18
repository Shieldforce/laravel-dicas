<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Services\LoginService;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $service = LoginService::handle($request);
        return new LoginResource($service);
    }
}
