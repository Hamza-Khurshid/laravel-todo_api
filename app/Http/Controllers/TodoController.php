<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    
    public function GetAllTodos(Request $request) {
        $todos = Todo::all();
        
        if($todos) {
            return response(['Todos' => $todos]);
        }

        return response(['message' => 'No todo found.']);
    }
    
    public function GetTodo(Request $request) {
        $todo = Todo::where(['id'=>$request['id']])->first();
        
        if($todo) {
            return response(['Todo' => $todo]);
        }

        return response(['message' => 'No record found against this id.']);
    }

    public function AddTodo(Request $request) {
        $todo = Todo::create(['title'=>$request['title'], 'description'=>$request['description']]);
        // $todo = Todo::create($request->all());
        return response($todo);
    }

    public function UpdateTodo(Request $request) {
        $newTodo = Todo::where('id', $request['id'])->update(['title'=>$request['title'], 'description'=>$request['description']]);
        
        return response($newTodo);
    }

    public function DeleteTodo(Request $request) {

        $todo = Todo::where('id', $request['id'])->first();

        if($todo) {
            $todo->delete();
            return response(['Todo' => $todo]);
        }

        return response('No record found against this id.');
    }
}
