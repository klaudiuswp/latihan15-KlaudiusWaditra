<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Todo;

class TodoController extends BaseController
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos, 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }
        return response()->json($todo, 200);
    }

    public function store(Request $request)
    {
        // dd($request);
        $todo = Todo::create($request->all());
        return response()->json($todo, 200);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo not found'
            ], 404);
        }
        $todo->update($request->all);
        return response()->json($todo,200);
    }

    public function destroy($id){
        $todo = Todo::find($id);
        if (!$todo){
            return response()->json([
                'message'=>'Todo not found'
            ], 404);
        }
        $todo->delete();
        return response()->json([
            'message'=>'Todo deleted'
        ],200);
    }
}
