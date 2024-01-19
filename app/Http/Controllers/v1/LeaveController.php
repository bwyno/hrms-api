<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LeaveRequest;
use App\Models\Leave;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class LeaveController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $model = QueryBuilder::for(Leave::class)
                ->allowedFilters(['leave_type_id', 'user_id'])
                ->get();
            return response()->json($model);
        } catch (Throwable $e) {
            return  response()->json($e);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $model = Leave::query()->find($id);
            return response()->json($model);
        } catch (Throwable $e) {
            return  response()->json($e);
        }
    }

    public function update(int $id, LeaveRequest $request ): JsonResponse
    {
        try {
            DB::beginTransaction();
            $model = Leave::query()->find($id);
            $model->update($request->all());
            DB::commit();
            return response()->json($model);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $model = Leave::query()->find($id);
            $model->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function store(LeaveRequest $request) : JsonResponse
    {
        try{
            DB::beginTransaction();
            $model = Leave::create($request->all());
            DB::commit();
            return response()->json($model);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }
}
