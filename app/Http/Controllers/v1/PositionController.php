<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\PositionRequest;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        return Position::all();
    }

    public function show(int $id): JsonResponse
    {
        $position = Position::query()->find($id);
        return response()->json($position);
    }

    public function store(PositionRequest $request) : JsonResponse
    {
        try{
          $position = new Position;
          $position->create($request->all());
          
          return response()->json($position);
        }catch (\Throwable $e){
            return response()->json($e);
        }
        

    }

    public function update(int $id, PositionRequest $request ): JsonResponse
    {
        $position = Position::query()->find($id);
        $position->update($request->all());

        return response()->json($position);
    }

    public function destroy(int $id): JsonResponse
    {
        $position = Position::query()->find($id);
        $position->delete();

        return response()->json(null, 204);
    }
}
