<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::paginate()
        );
    }

    public function show(User $user)
    {
        return new UserResource(
            $user
        );
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        return new UserResource(
            User::create($data)
        );
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return new UserResource(
            $user
        );
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
