<?php

namespace App\Http\Controllers;

use App\Models\SugarOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SearchController extends Controller{


//    public function search(Request $request)
//    {
//        $query = $request->input('query');
//
//        // Perform your search logic here using the $query
//
//        // Return the search results to the client as JSON
//        return response()->json($results);
//    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform your search logic here using the $query

        $results = SugarOrder::where('title', 'LIKE', '%' . $query . '%')->get();


        // Return the search results to the client as JSON

        return redirect()->route('search.result', ['results' => $results]);

        return response()->json($results);
    }



}
