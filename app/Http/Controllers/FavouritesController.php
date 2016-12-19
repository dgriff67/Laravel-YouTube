<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\FavouriteFormRequest;
use App\Favourite;
class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $favourite = new Favourite(array(
            'title' => $request->get('title'),
            'videoid' => $request->get('videoid'),
            'user_id' => $request->get('user_id'),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
