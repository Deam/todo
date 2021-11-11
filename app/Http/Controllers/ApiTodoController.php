<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class ApiTodoController extends Controller
{
    public function all() {
        return response()->json(Todo::with('category')->get());
    }

    public function single() {
        return response()->json(Todo::where('id', request('id'))->first());
    }

    public function store() {
        request()->validate([
            'title' => 'required',            
            'description' => 'required',            
            'status' => 'required',            
            'category' => 'required',            
        ]);

        $todo = new Todo();
        $todo->title = request('title');
        $todo->description = request('description');
        $todo->done = request('status');
        $todo->category_id = request('category');
        $todo->save();

        return response()->json(200);
    }

    public function edit() {
        request()->validate([
            'id' => 'required',            
            'title' => 'required',            
            'description' => 'required',            
            'category' => 'required',            
        ]);

        $todo = Todo::find(request('id'));
        $todo->title = request('title');
        $todo->description = request('description');
        $todo->category_id = request('category');
        $todo->save();

        return response()->json(200);
    }

    public function delete() {
        $todo = Todo::where('id', request('id'))->first();

        $todo->delete();

        return response()->json(200);
    }

    public function finish() {
        request()->validate([
            'id' => 'required',                    
        ]);

        $todo = Todo::where('id', request('id'))->first();

        $todo->done = request('status');
        $todo->save();

        return response()->json(200);
    }
}
