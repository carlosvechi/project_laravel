<?php

namespace App\Http\Controllers;

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
        $validated = $request->validate([
            'board_id' => 'required|exists:boards, id',
            'title' => 'requerid|string|max:50',
            'position_order' => 'required|integer'
        ]);

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
        $validated = $request->validate([
            'title' => 'sometimes|string|min:5|max:50',
            'position_order' => 'sometimes|integer|min:5'
        ]);

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
    }
}
