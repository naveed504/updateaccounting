<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function showadmins()
    {
        return view('admin.dashboard');
    }
    public function adminregister()
    {
        return view('register.register');
    }
    public function adminlogin()
    {
        return view('register.login');
    }
  
}