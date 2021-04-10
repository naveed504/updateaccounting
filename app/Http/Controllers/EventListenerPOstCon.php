<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PostCreated;

class EventListenerPOstCon extends Controller
{
    
    public function index()
    {
        return view('eventlistener.index');
    }
    public function store(Request $request){
        $post=new Post;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();
    
       event( new PostCreated($post));


       


    }
}
