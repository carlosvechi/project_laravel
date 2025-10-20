<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Task::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->response([
            'title' => 'required|string|max:50',
            'descricao' => 'nullable|string|max:255',
            'asign_user' => 'required|exists:users, id',
            'position_id'=> 'required|exists:positions, id',
            'users_id' => 'required|exists:users, id',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        if(!$task){
            return response()->json(['message' => 'Task não encontrada!' ], 404);
        }

        return response()->json($task);
    }

    
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'descricao' => 'nullable|string|max:255',
            'asign_user' => 'required|exists:users, id',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date'
        ]);

        $task = Task::find($id);

        if(!$task){
            return response()->json(['message' => 'Task não encontrada!'], 404);
        }

       $task->update($validated);

        return response()->json($task);
    }

    public function destroy(string $id)
    {
        $task = Task::find($id);

        if(!$task){
            return response()->json(['message' => 'Task não encontrada!'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deletada com sucesso!']);
    }
}
