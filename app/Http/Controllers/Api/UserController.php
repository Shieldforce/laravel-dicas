<?php

namespace App\Http\Controllers\Api;

use App\Events\User\UserStoreEvent;
use App\Exceptions\UserEsxception;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $create = User::create($data);

            event(new UserStoreEvent($request, $create));

            DB::commit();

            return new UserResource(
                $create
            );
        } catch (UserEsxception $exception) {

            DB::rollBack();

            throw $exception;
        }
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
