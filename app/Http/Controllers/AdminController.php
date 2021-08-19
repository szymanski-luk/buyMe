<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usersList()
    {
        if (Auth::user()->type == 'admin')
        {
            $users = User::all();

            return view('admin.panel', ['users' => $users]);
        }
        else return redirect()->route('index');

    }

    public function giveAdminRights(Request $request)
    {
        $user = User::query()
            ->where('id', '=', $request->id)
            ->first();

        $user->type = 'admin';
        $user->save();

        return redirect()->route('users_list');
    }

    public function revokeAdminRights(Request $request)
    {
        $user = User::query()
            ->where('id', '=', $request->id)
            ->first();

        $user->type = 'user';
        $user->save();

        return redirect()->route('users_list');
    }
}
