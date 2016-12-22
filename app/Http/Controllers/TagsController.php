<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TagFormRequest;

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
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

}
