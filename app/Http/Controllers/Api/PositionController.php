<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Position::all());
    }

    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
            'board_id' => 'required|exists:boards,id',
            'title' => 'required|string|max:50',
            'position_order' => 'required|integer'
        ]);
        }catch(\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
        

        $position = Position::create($validated);

        return response()->json($position, 201);
    }

    public function show(string $id)
    {
        $position = Position::find($id);

        if(!$position) {
            return response()->json(['message' => 'Posição não encontrada!']);
        }

        return response()->json($position);
    }

    
    public function update(Request $request, string $id)
    {
        try{
            $validated = $request->validate([
            'title' => 'sometimes|string|min:5|max:50',
            'position_order' => 'sometimes|integer'
        ]);
        }catch(\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
        

        $position = Position::find($id);

        if(!$position) {
            return response()->json(['message' => 'Posição não encontrada!']);
        }

        $position->update($validated);

        return response()->json($position, 201);
    }

    
    public function destroy(string $id)
    {
        $position = Position::find($id);

        if(!$position) {
            return response()->json(['message' => 'Posição não encontrada!']);
        }

        $position->delete();

        return response()->json(['message' => 'Posição deletada com sucesso!'], 201);
    }
}
