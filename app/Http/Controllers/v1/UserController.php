<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(int $user_id): JsonResponse
    {
        $user = User::query()->find($user_id);
        return response()->json($user);
    }

    public function update(int $user_id, UserRequest $request ): JsonResponse
    {
        $user = User::query()->find($user_id);
        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy(int $user_id): JsonResponse
    {
        $user = User::query()->find($user_id);
        $user->delete();

        return response()->json(null, 204);
    }
}
