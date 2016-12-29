<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
        return view('favourites.search', ['searchResponse'=> $searchResponse]);
    }

    public function results(Request $request)
    {
        $DEVELOPER_KEY = 'AIzaSyCiFuJxg2zt20dZgRyw5Q7w1sajIORrBEg';

        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);
        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);
        try {
            $searchResponse = $youtube->search->listSearch('id,snippet',
            array(
              'q' => $request->get('q'),
              'maxResults' => $request->get('maxResults')
            ));
            return view('favourites.search', ['searchResponse'=> $searchResponse]);
        } catch (Google_Service_Exception $e) {
            $e->getMessage();
        } catch (Google_Exception $e) {
            $e->getMessage();
        }
    }
}
