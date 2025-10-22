<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;


class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Board::all());
        
        // $user = $request->user;
        // $user = User::find(1);
        // $board = $user->boards()->with('position.task')->get();
        // return response()->json($board, 200);
    }


    /**
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'title' => 'required|string|max:255',
            ]);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 400);
        }

       $board = Board::create($validated);

        return response()->json($board, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
      $board = Board::find($id);

      if(!$board){
        return response()->json(['message' => 'Board não encontrado!'], 404);
      }

      return response()->json($board);
    }

    public function update(Request $request, string $id)
    {
        try{
            $validated = $request->validate([
            'title' => 'sometimes|string|max:255|min:5'
            ]);
        }catch(\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
        

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

        if(!$board){
            return response()->json(['message' => 'Board não encontrado!'], 404);
        }

        $board->delete();

        return response()->json(['message' => 'Board deletado com sucesso!']);
    }
}
