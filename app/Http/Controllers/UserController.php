<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function details($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        $auctions = Advert::query()
            ->where('user_id', $id)
            ->paginate(10);

        return view('user.details', ['user' => $user, 'auctions' => $auctions]);
    }
}
