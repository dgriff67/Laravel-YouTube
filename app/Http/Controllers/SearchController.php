<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Google_Client;
use Google_Service_YouTube;

require_once __DIR__ . '/../../../vendor/autoload.php';

class SearchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        $searchResponse = NULL;
        return view('search.index', ['searchResponse'=> $searchResponse]);
    }

    /**
     * Play search result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request)
    {
        return view('search.play', ['searchResult'=> $request]);
    }

    public function results(Request $request)
    {
        if ($request->get('q') == NULL) {
            $searchResponse = NULL;
            return view('search.index', ['searchResponse'=> $searchResponse]);
        }
        $DEVELOPER_KEY = Config::get('google.developer_key');

        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);
        $request->flash();
        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);
        try {
            $searchResponse = $youtube->search->listSearch('id,snippet',
            array(
              'q' => $request->get('q'),
              'maxResults' => $request->get('maxResults')
            ));
            return view('search.index', ['searchResponse'=> $searchResponse]);
        } catch (\Google_Service_Exception $e) {
            return response()->view('errors.google', compact('e'), $e->getCode());
        } catch (\Google_Exception $e) {
            return response()->view('errors.google', compact('e'), $e->getCode());
        }
    }
}
