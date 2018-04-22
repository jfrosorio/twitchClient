<?php

namespace App\Http\Controllers;

use App\Lib\MyTwitchApi\Search;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $needle = ($request->has('search')) ? $request->get('search') : '%';

        $options = [
            'query'  => $needle,
            'limit' => 100
        ];


        $results = Search::streams($options);

        $streams = json_decode(json_encode($results['streams']));

        $page = request()->get('page', 1);
        $perPage = 15;
        $offset = ($page * $perPage) - $perPage;

        $streams = new LengthAwarePaginator(array_slice($streams, $offset, $perPage, true), count($streams), $perPage, $page);

        return view(
            'welcome',
            compact(
                'streams'
            )
        );
    }
}
