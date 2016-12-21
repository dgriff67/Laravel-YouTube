<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FavouriteFormRequest;
use App\Favourite;
use Illuminate\Support\Facades\Auth;

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
        //$id = Auth::id();
        //$favourites = Favourite::with('user')->findOrFail($id);
        $favourites = Favourite::all();
        return view('favourites.index', compact('favourites'));
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
        $id = Auth::id();

        $favourite = new Favourite(array(
            'title' => $request->get('title'),
            'videoid' => $request->get('videoid'),
            'user_id' => $id
        ));

        $favourite->save();

        return redirect('/create')->with('status', 'Your favourite has been created!');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favourite = Favourite::whereId($id)->firstOrFail();
        return view('favourites.show', compact('favourite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favourite = Favourite::whereId($id)->firstOrFail();
        return view('favourites.edit', compact('favourite'));
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
        $favourite->title = $request->get('title');
        $favourite->videoid = $request->get('videoid');
        $favourite->save();
        return redirect(action('FavouritesController@edit', $favourite->id))->with('status', 'The favourite '.$id.' has been updated!');

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
