<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TagFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(TagFormRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request['name'];
        $request->user()->tags()->save($tag);

        return redirect('/tags')->with('status', 'Your new tag has been created!');
    }

    public function index()
    {
        $user_id = Auth::id();
        $tags = Tag::where('user_id', $user_id)
            ->get();
        return view('tags.index', compact('tags'));
    }

    public function show($id)
    {
        $user_id = Auth::id();
        $tag = Tag::whereId($id)->firstOrFail();
        $favourites = $tag->favourites()->get();
        foreach ($favourites as $favourite) {
            $favourite->tags = $favourite->tags()->get();
        }
        return view('favourites.index', compact('favourites','tag'));
    }

}
