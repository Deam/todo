<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        return view('index');
    }

    public function create() {
        return view('todo.create');
    }

    public function details(Todo $todo) {
        return view('todo.details')->with('todo', $todo);
    }

    public function edit(Todo $todo) {
        return view('todo.edit')->with('todo', $todo);
    }
}
