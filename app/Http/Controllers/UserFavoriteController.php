<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UserFavoriteController extends Controller
{
     public function favorite(Request $request, $id)
    {
        \Auth::user()->favorite($id);
         return redirect()->back();
    }

    public function unfavorite($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
}
