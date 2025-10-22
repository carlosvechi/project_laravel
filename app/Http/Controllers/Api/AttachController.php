<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attach;

class AttachController extends Controller
{
    public function index()
    {
       return response()->json(Attach::all());
    }
    public function store(Request $request)
    {
       $validated = $request->validate([
         'task_id' => 'required|exists:tasks, id',
         'user_id' => 'required|exists: users, id',
         'file_url' => 'nullable'
       ]);

       $attach = Attach::create($validated);

       return response()->json($attach, 201);
    }

    public function show(string $id)
    {
       $attach = Attach::find($id);

       if(!$attach){
         return response()->json(['message' => 'Anexo não encontrado!']);
       }

       return response()->json($attach);
    }

    public function update(Request $request, string $id)
    {
       $validated = $request->validate([
         'file_url' => 'nullable'
       ]);

       $attach = Attach::find($id);

       if(!$attach){
         return response()->json(['message' => 'Anexo não encontrado!']);
       }

       $attach->update($validated);

       return response()->json($attach, 201);
    }

    public function destroy(string $id)
    {
       $attach = Attach::find($id);

       if(!$attach){
         return response()->json(['message' => 'Anexo não encontrado!']);
       }

       $attach->delete();

       return response()->json(['message' => 'Anexo excluído com sucesso!']);
    }
}