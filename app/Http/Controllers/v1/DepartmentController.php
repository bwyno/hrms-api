<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\v1\DepartmentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DepartmentController extends Controller
{
    public function index()
    {
        try{
            $department = Department::all();
            DB::commit();
            return response()->json($department);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function show(int $department_id): JsonResponse
    {   
        try{
            $department = Department::query()->find($department_id);
            DB::commit();
            return response()->json($department);
        }catch(Throwable $e){
            DB::rollback();
            return response()->json($e);
        }    
    }
    
    public function create(DepartmentRequest $request): JsonResponse
    {
        try{
            $department = Department::create(
                $request->all(),
            ); 
            DB::commit();
            return response()->json($department);
        }catch(Throwable $e){
            DB::rollback();
            return response()->json($e);
        }    
    }

    public function update(int $department_id, DepartmentRequest $request ): JsonResponse
    {
        try{
            $department = Department::query()->find($department_id);
            $department->update($request->all());
            DB::commit();
            return response()->json($department);
        }catch(Throwable $e){
            DB::rollback();
            return response()->json($e);
        }    
    }

    public function destroy(int $department_id): JsonResponse
    {
        try{
            $department = Department::query()->find($department_id);
            $department->delete();
            DB::commit();
            return response()->json(null, 204);
        }catch(Throwable $e){
            DB::rollback();
            return response()->json($e);
        }   
    }
}
