<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $users = QueryBuilder::for(User::class)
                ->get();
            return response()->json($users);
        } catch (Throwable $e) {
            return  response()->json($e);
        }
    }

    public function show(int $user_id): JsonResponse
    {
        try {
            $user = User::query()->find($user_id);
            return response()->json($user);
        } catch (Throwable $e) {
            return  response()->json($e);
        }
    }

    public function update(int $user_id, UserRequest $request ): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = User::query()->find($user_id);
            $user->update($request->all());
            DB::commit();
            return response()->json($user);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function destroy(int $user_id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = User::query()->find($user_id);
            $user->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }
}
