<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TagFormRequest;

use App\Tag;

class TagsController extends Controller
{
    public function newTag(TagFormRequest $request)
    {
        $tag = new Tag(array(
            'name' => $request->get('name'),
            'user_id' => $request->get('user_id'),
        ));

        $tag->save();

        return redirect('/favourites')->with('status', 'Your tag has been created!');
    }
}
