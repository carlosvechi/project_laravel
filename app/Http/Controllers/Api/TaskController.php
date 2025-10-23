<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        return response()->json(Task::all());
    }

    
    public function store(Request $request)
    {
        try{
             $validated = $request->validate([
            'title' => 'required|string|max:50',
            'descricao' => 'sometimes|string|max:255',
            'asign_user' => 'nullable|exists:users,id',
            'position_id'=> 'required|exists:positions,id',
            'user_id' => 'nullable|exists:users,id',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date',
            ]);

            
            $task = Task::create($validated);
            
            return response()->json($task, 201);
        }catch(\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

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
        try{
            $validated = $request->validate([
            'title' => 'sometimes|string|max:50',
            'descricao' => 'sometimes|string|max:255',
            'asign_user' => 'sometimes|exists:users, id',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date'
        ]);
        }catch(\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
        

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
