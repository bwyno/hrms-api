<?php

namespace App\Http\Controllers\v1;

use App\Models\LeaveType;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LeaveTypeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        return LeaveType::all();
    }

    public function show(int $id): JsonResponse
    {
        $leavetype = LeaveType::query()->find($id);
        return response()->json($leavetype);
    }

    public function store(LeaveTypeRequest $request) : JsonResponse
    {
        try{
            $leavetype = LeaveType::create($request->all());
          
            return response()->json($leavetype);
        }catch (\Throwable $e){
            return response()->json($e);
        }
    }

    public function update(int $id, LeaveTypeRequest $request ): JsonResponse
    {
        $leavetype = LeaveType::query()->find($id);
        $leavetype->update($request->all());

        return response()->json($leavetype);
    }

    public function destroy(int $id): JsonResponse
    {
        $leavetype = LeaveType::query()->find($id);
        $leavetype->delete();

        return response()->json(null, 204);
    }
}
