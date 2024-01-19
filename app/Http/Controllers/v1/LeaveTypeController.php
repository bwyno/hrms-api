<?php

namespace App\Http\Controllers\v1;

use App\Models\LeaveType;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LeaveTypeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Throwable;

class LeaveTypeController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            DB::beginTransaction();
            $leavetype = LeaveType::all();
            DB::commit();
            return response()->json($leavetype);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $leavetype = LeaveType::query()->find($id);
            DB::commit();
            return response()->json($leavetype);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function store(LeaveTypeRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
            $leavetype = LeaveType::create($request->all());
            DB::commit();
            return response()->json($leavetype);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function update(int $id, LeaveTypeRequest $request ): JsonResponse
    {
        try {
            DB::beginTransaction();
            $leavetype = LeaveType::query()->find($id);
            $leavetype->update($request->all());
            DB::commit();
            return response()->json($leavetype);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $leavetype = LeaveType::query()->find($id);
            $leavetype->delete();
            DB::commit();
            return response()->json($leavetype);
        } catch (Throwable $e) {
            DB::rollback();
            return  response()->json($e);
        }
    }
}
