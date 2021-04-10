<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\ImageFavourite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavouriteImagesController extends Controller
{
    public function imgview()
    {
        $images = Image::all();
       

        return view('favourites.imgview', compact('images'));
    }
   public function addtofav(Request $request)
   {
      
       $checkfavrecord = ImageFavourite::where('images_id', $request->imgid)->where('users_id', $request->userid)->first();
       if($request->imgid  != ($checkfavrecord->images_id ?? '') )
       {
           $query = ImageFavourite::create([
               'users_id' => $request->userid,
               'images_id' => $request->imgid,
               // 'ip' => $request->ip
           ]);
       }else{
           $query =  ImageFavourite::where('images_id',$request->imgid)->where('users_id',$request->userid)->delete();
       }
      
           
       return response()->json($query);
       
   }
   public function favouriteViews()
   {
    $favimages = ImageFavourite::all();

       return view('favourites.viewfavourites', compact('favimages'));
   }
}
