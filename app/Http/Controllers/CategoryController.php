<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesList() {
        $categories = Category::all();

        return view('category.list', ["categories" => $categories]);
    }
}
