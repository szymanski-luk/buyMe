<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'content' => ['required', 'string', 'max:900'],
            'city' => ['required', 'string', 'min:3', 'max:80'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg']
        ]);
    }

    public function newAdvert()
    {
        $categories = Category::all();
        return view('auction.new', ['categories' => $categories]);
    }

    public function saveAdvert(Request $request) {

    }
}
