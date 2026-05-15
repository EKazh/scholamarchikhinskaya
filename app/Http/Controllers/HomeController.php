<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newinfo;

class HomeController extends Controller
{
    //show home page
    public function showHome()
    {
        $news = Newinfo::latest()->take(3)->get();
        return view('welcome', compact('news'));
    }
    
}
