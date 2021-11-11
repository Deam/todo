<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return view('category.index');
    }

    public function edit(Category $category) {
        return view('category.edit')->with('category', $category);
    }
}
