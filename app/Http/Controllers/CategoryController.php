<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesList() {
        $categories = Category::all();

        return view('category.list', ["categories" => $categories]);
    }

    public function details($id)
    {
        $auctions = Advert::all()->where('category_id', '=', $id);
        $category = Category::where('id', '=', $id)->first();

        return view('category.details', ['auctions' => $auctions, 'category' => $category]);
    }

}
