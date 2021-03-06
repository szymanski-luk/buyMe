<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Advert;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['details', 'search']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string', 'max:3000'],
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string', 'max:3000'],
            'city' => ['required', 'string', 'min:3', 'max:80'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
            'category' => ['required']
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

            $advert = new Advert();
            $advert->title = $request->name;
            $advert->category_id = $request->category;
            $advert->content = $request->description;
            $advert->city = $request->city;
            $advert->img = $filename;
            $advert->price = $request->price;
            $advert->user_id = Auth::user()->id;

            $advert->save();
        }

        return redirect(route('my_adverts'));
    }

    public function myAdverts()
    {
        $auctions = Advert::query()
            ->where('user_id', '=', Auth::user()->id)
            ->paginate(10);

        return view('auction.own', ['auctions'=>$auctions]);
    }

    public function details($id)
    {
        $categories = Category::all();
        $auction = Advert::where('id', '=', $id)->first();
        return view('auction.details', ['auction' => $auction, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->searchTerm;

        $auctions = Advert::query()
            ->where('title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('content', 'LIKE', "%{$searchTerm}%")
            ->paginate(15);

        return view('auction.searching', ['auctions' => $auctions, 'searchTerm' => $searchTerm]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string', 'max:3000'],
            'city' => ['required', 'string', 'min:3', 'max:80'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $advert = Advert::query()
            ->where('id', '=', $request->id)
            ->first();

        $advert->title = $request->name;
        $advert->category_id = $request->category;
        $advert->content = $request->description;
        $advert->city = $request->city;
        $advert->price = $request->price;
        $advert->user_id = Auth::user()->id;

        $advert->save();

        return redirect()->route('advert_details', ['id' => $request->id]);
    }

    public function delete(Request $request)
    {
        $advertToDelete = Advert::query()
                                ->where('id', '=', $request->id)
                                ->first();

        $advertToDelete->delete();

        return redirect()->route('my_adverts');
    }
}
