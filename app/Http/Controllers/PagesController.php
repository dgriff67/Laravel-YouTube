<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function favourites()
    {
        return view('favourites');
    }

    public function tags()
    {
        return view('tags');
    }
}
