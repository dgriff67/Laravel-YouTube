<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        return view('favourites.search');
    }

    public function results(Request $request)
    {

        return view('favourites.search', ['searchResults'=> $searchResults]);
    }
}
