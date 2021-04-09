<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\ImageFavourite;

class FavouriteImagesController extends Controller
{
    public function imgview()
    {
        $images = Image::all();
       

        return view('favourites.imgview', compact('images'));
    }
   public function addtofav(Request $request)
   {
       
       $checkfavrecord = ImageFavourite::where('image_id', $request->imgid)->where('user_id', $request->userid)->first();
       if($request->imgid  != ($checkfavrecord->image_id ?? '') )
       {
           $query = ImageFavourite::create([
               'user_id' => $request->userid,
               'image_id' => $request->imgid,
               // 'ip' => $request->ip
           ]);
       }else{
           $query =  ImageFavourite::where('image_id',$request->imgid)->where('user_id',$request->userid)->delete();
       }
      
           
       return response()->json($query);
       
   }
}
