<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteImagesController extends Controller
{
    public function imgview()
    {
        return view('favourites.imgview');
    }
}
