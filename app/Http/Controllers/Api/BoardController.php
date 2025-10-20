<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Position;
use Inertia\Inertia;
use Inertia\Response;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Boards');
    }


    /**
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'requerid|string|max:255',
        ]);

       $board = Board::create($validated);

        return response()->json($board, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $board = Board::find($id);

      if(!$board){
        return response()->json(['message' => 'Board não encontrado!'], 404);
      }

      return response()->json($board);
    }

    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $board = Board::find($id);

        if(!$board){
            return response()->json(['message' => 'Board não encontrado'], 404);
        }

        $board->update($validated);

        return response()->json($board);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $board = Board::find($id);

        if($board){
            return response()->json(['message' => 'Board não encontrado!'], 404);
        }

        $board->delete();

        return response()->json(['message' => 'Board deletado com sucesso!']);
    }
}
