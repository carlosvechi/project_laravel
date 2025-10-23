<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
      try{
         return response()->json(Comment::all());
      }catch(\Exception $e) {
         return response()->json($e->getMessage(), 400);
      }
       
    }
    
    public function store(Request $request)
    {
      try{
         $validated = $request->validate([
        'task_id' => 'required|exists:tasks,id',
        'user_id' => 'required|exists:users,id',
        'descricao' => 'required|string|max:255'
       ]);
      }catch(\Exception $e) {
         return response()->json($e->getMessage(), 400);
      }
       

       $comment = Comment::create($validated);

       return response()->json($comment, 201);
    }

    public function show(string $id)
    {
       $comment = Comment::find($id);

       if(!$comment){
        return response()->json(['message' => 'Comentário não encontrado'], 404);
       }
    }

    public function update(Request $request, string $id)
    {
      try{
          $validated = $request->validate([
        'descricao' => 'sometimes|string|max:255|min:2'
       ]);
      }catch(\Exception $e) {
         return response()->json($e->getMessage(), 400);
      }
      

       $comment = Comment::find($id);

       if(!$comment){
        return response()->json(['message' => 'Comentário não encontrado!'], 404);
       }

       $comment->update($validated);

       return response()->json($comment);
    }

    public function destroy(string $id)
    {
       $comment = Comment::find($id);

       if(!$comment){
        return response()->json(['message' => 'Comentário não encontrado!', 400]);
       }

       $comment->delete();

       return response()->json(['message' => 'Comentário excluído com sucesso!']);

    }
}