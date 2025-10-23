<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attach;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\FileBag;


class AttachController extends Controller
{
    public function index()
    {
       return response()->json(Attach::All());
    }

    public function store(Request $request)
    {
      try{
        $validated = $request->validate([
         'task_id' => 'required|exists:tasks,id',
         'user_id' => 'required|exists:users,id',
       ]);

       $attachesFiles = $this->handleAttach($request->file('file_url'), $validated['user_id'], $validated['task_id']);
        
        $attaches = [];

        foreach ($attachesFiles as $attachData) {
            $attaches[] = Attach::create($attachData);
        }
      }catch(\Exception $e) {
        return response()->json($e->getMessage(), 400);
      }
       

        return response()->json($attaches, 201);
    }

    private function handleAttach($files, int $user_id, int $task_id) 
    {
      $attaches = [];

      foreach ($files as $file) {
        $path = $file->store('attachments/'. $task_id, 'local');

        $attaches[] = [
          'user_id' => $user_id,
          'task_id' => $task_id,
          'file_url' => Storage::disk('local')->path($path)
        ];
      }

      return $attaches;
    }

    public function show(string $id)
    {
       $attach = Attach::find($id);

       if(!$attach){
         return response()->json(['message' => 'Anexo não encontrado!'], 404);
       }

       return response()->json($attach);
    }

    public function destroy(string $id)
    {
       $attach = Attach::find($id);

       if(!$attach){
         return response()->json(['message' => 'Anexo não encontrado!'], 404);
       }

       $attach->delete();

       return response()->json(['message' => 'Anexo excluído com sucesso!']);
    }
}