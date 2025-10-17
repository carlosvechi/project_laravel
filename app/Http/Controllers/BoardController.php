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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'board_id' => 'required|id',
            'descricao' => 'required|string|min:5',
            'status' => 'required',
            
        ]);

        $coluna = Position::create([
            'board_id' => $request->board_id,
            'descricao' => $request->descricao,
            'status' => $request->status,
        ]);

        // return response()->json([
        //     'coluna' => $coluna,
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $position = Board::find(1)->position()->where('id', $id)->get()->first();
            $request->validate([
                //validacao = função de criar

            
            ]);

            $position->descricao = $request->descricao;

            $position->update();

        }catch(Exception $e){

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
