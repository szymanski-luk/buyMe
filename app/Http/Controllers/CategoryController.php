<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function categoriesList() {
        $categories = Category::all();

        return view('category.list', ["categories" => $categories]);
    }

    public function details($id)
    {
        $auctions = Advert::query()
            ->where('category_id', '=', $id)
            ->paginate(16);

        $category = Category::where('id', '=', $id)->first();

        return view('category.details', ['auctions' => $auctions, 'category' => $category]);
    }

    public function saveCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'dimensions:ratio=1/1'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/images/' . $filename));

            $category = new Category();
            $category->name = $request->name;
            $category->img = $filename;

            $category->save();
        }
        return redirect()->route('categories_list');
    }

    public function editCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'image' => ['mimes:png,jpg,jpeg', 'dimensions:ratio=1/1'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/images/' . $filename));

            $category = Category::query()
                                -> where('id', '=', $request->id)->first();
            $category->name = $request->name;
            $category->img = $filename;

            $category->save();
        }
        else {
            $category = Category::query()
                -> where('id', '=', $request->id)->first();
            $category->name = $request->name;

            $category->save();
        }

        return redirect()->route('categories_list');
    }
}
