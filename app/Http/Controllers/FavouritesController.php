<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FavouriteFormRequest;
use App\Favourite;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        //$favourites = Favourite::with('user')->findOrFail($id);
        //$favourites = Favourite::all();
        $favourites = Favourite::where('user_id', $user_id)->get();
        foreach ($favourites as $favourite) {
            $favourite->tags = $favourite->tags()->get();
        }
        //Because this view is shared with the show action for the
        //tag controller we set $tag to the empty simplexml_load_string
        $tag = '';
        return view('favourites.index', compact('favourites','tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('favourites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavouriteFormRequest $request)
    {
        $favourite = new Favourite();
        $favourite->title = $request->get('title');
        $favourite->videoid = $request->get('videoid');
        $favourite->kind = $request->get('kind');
        $favourite->imageUrl = $request->get('imageUrl');

        $request->user()->favourites()->save($favourite);
        return redirect(action('FavouritesController@show', $favourite->id))->with('status', 'Your favourite '.$favourite->id.' has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $favourite = Favourite::whereId($id)->firstOrFail();
        $tags = Tag::where('user_id', $user_id)->get();
        $tag_string = '';
        foreach ($tags as $tag) {
            if ($tag->favourites()->where('favourites.id',$id)->count()>0) {
                if ($tag_string) {
                    $tag_string .= '|' . $tag->name;
                } else {
                    $tag_string .= $tag->name;
                }
            }
        }
        return view('favourites.show', ['favourite'=> $favourite , 'tag_string' => $tag_string]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $favourite = Favourite::whereId($id)->firstOrFail();
        $tags = Tag::where('user_id', $user_id)->get();
        foreach ($tags as $tag) {
            $tag->checked = $tag->favourites()->where('favourites.id',$id)->count()>0;
        }
        return view('favourites.edit', ['favourite' => $favourite, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FavouriteFormRequest $request, $id)
    {
        $favourite = Favourite::whereId($id)->firstOrFail();
        $favourite->tags()->detach();

        $tags_checked = $request->get('tag');
        if(is_array($tags_checked))
        {
            foreach ($tags_checked as $tag_id) {
                $tag = Tag::whereId($tag_id)->firstOrFail();
                $favourite->tags()->attach($tag);
            }
        }

        $favourite->title = $request->input('title');
        $favourite->update();

        return redirect(action('FavouritesController@show', $favourite->id))->with('status', 'The favourite '.$id.' has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite = Favourite::whereId($id)->firstOrFail();
        $favourite->delete();
        return redirect('/favourites')->with('status', 'The favourite '.$id.' has been deleted!');
    }
}
