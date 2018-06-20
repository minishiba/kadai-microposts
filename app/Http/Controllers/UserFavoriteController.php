<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Micropost; // add

class UserFavoriteController extends Controller
{
     public function favorite(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $favorites,
        ];

        $data += $this->counts($user);
        return view('users.favorites', $data);
    }

    public function unfavorite($id)
    {
        \Auth::user()->unfavorite($id);
        $user = User::find($id);
        $unfavorites = $user->unfavorites()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $unfavorites,
        ];

        $data += $this->counts($user);

        return view('users.unfavorites', $data);
    }
}
