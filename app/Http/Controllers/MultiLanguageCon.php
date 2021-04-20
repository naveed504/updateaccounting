<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class MultiLanguageCon extends Controller
{
    public function index()
    {
        return view('admin.language.index');
    }
    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }
}
