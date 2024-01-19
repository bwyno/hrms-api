<?php

namespace App\Http\Controllers\v1;

use App\Models\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\PositionRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


use Illuminate\Support\Facades\DB;
use Throwable;

class PositionController extends Controller
{
    public function index()
    {
        try{
            DB::beginTransaction();
            $position = Position::all();
            DB::commit();
            return response()->json($position);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function show(int $id): JsonResponse
    {
        try{
            DB::beginTransaction();
            $position = Position::query()->find($id);
            DB::commit();
            return response()->json($position);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function store(PositionRequest $request) : JsonResponse
    {
        try{
            DB::beginTransaction();
            $position = Position::create($request->all());
            DB::commit();
            return response()->json($position);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function update(int $id, PositionRequest $request ): JsonResponse
    {
        try{
            DB::beginTransaction();
            $position = Position::query()->find($id);
            $position->update($request->all());
            DB::commit();
            return response()->json($position);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try{
            DB::beginTransaction();
            $position = Position::query()->find($id);
            $position->delete();
            DB::commit();
            return response()->json($position);
        } catch (Throwable $e){
            DB::rollback();
            return  response()->json($e);
        }
    }
}
