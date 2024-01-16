<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\v1\DepartmentRequest;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::all();
    }

    public function show(int $department_id): JsonResponse
    {
        $department = Department::query()->find($department_id);
        return response()->json($department);
    }
    
    public function create(DepartmentRequest $request): JsonResponse
    {
        $department = Department::create(
            $request->all(),
        ); 

        return response()->json($department);
    }

    public function update(int $department_id, DepartmentRequest $request ): JsonResponse
    {
        $department = Department::query()->find($department_id);
        $department->update($request->all());

        return response()->json($department);
    }

    public function destroy(int $department_id): JsonResponse
    {
        $department = Department::query()->find($department_id);
        $department->delete();

        return response()->json(null, 204);
    }
}
