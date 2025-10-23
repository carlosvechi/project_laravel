<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;

class StepController extends Controller
{
    public function index()
    {
       return response()->json(Step::all());
    }
    public function store(Request $request)
    {
      try{
        $validated = $request->validate([
         'task_id' => 'required|exists:tasks,id',
         'user_id' => 'required|exists:users,id',
         'descricao' => 'nullable|string|max:255',
         'completed' => 'nullable|boolean'
      ]);
      }catch(\Exception $e) {
        return response()->json($e->getMessage(), 400);
      }
      

      $step = Step::create($validated);

      return response()->json($step, 201);
    }

    public function show(string $id)
    {
       $step = Step::find($id);

       if(!$step){
         return response()->json(['message' => 'Etapa não encontrada!']);
       }

       return response()->json($step, 201);
    }

    public function update(Request $request, string $id)
    {
       $validated = $request->validate([
         'descricao' => 'nullable|string|max:255',
         'completed' => 'nullable|boolean'
       ]);

       $step = Step::find($id);

       if(!$step){
         return response()->json(['message' => 'Etapa não encontrada!']);
       }

       $step->update($validated);

       return response()->json($step, 201);
    }

    public function destroy(string $id)
    {
       $step = Step::find($id);

       if(!$step){
         return response()->json(['message' => 'Etapa não encontrada!']);
       }

       $step->delete();

       return response()->json(['message' => 'Etapa deletada com sucesso!']);
    }
}