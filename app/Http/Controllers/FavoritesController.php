<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($micropostId)
    {
        \Auth::user()->favorite($micropostId);
        
        return back()->with('favorite_message', 'お気に入りに登録しました。');
    }
    
    public function destroy($micropostId)
    {
        \Auth::user()->unfavorite($micropostId);
        
        return back()->with('unfavorite_message', 'お気に入りを解除しました。');
    }
}
