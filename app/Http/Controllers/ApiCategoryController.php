<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ApiCategoryController extends Controller
{
    public function all() {
        return response()->json(Category::all());
    }

    public function single() {
        return response()->json(Category::where('id', request('id'))->first());
    }

    public function edit() {
        request()->validate([
            'title' => 'required',
            'id' => 'required',            
        ]);

        $category = Category::find(request('id'));
        $category->title = request('title');
        $category->save();

        return response()->json(200);
    }

    public function store() {
        request()->validate([
            'title' => 'required',            
        ]);

        $category = new Category();
        $category->title = request('title');
        $category->save();

        return response()->json(200);
    }
}
