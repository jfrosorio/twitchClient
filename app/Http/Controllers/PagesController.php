<?php

namespace App\Http\Controllers;

use App\Lib\MyTwitchApi\Search;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cookie;
use TwitchApi;

class PagesController extends Controller
{
    /**
     * Shows the welcome page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // By default, we will return the 100 first streams found.
        $needle = '%';

        // If the user performs a search, we will return the matching streams.
        if($request->has('search') && !empty($request->get('search'))){
            $needle = $request->get('search');
        }


        // Twitch API search
        $results = Search::streams([
            'query'  => $needle,
            'limit' => 100
        ]);

        $streams = ($results['streams']) ? json_decode(json_encode($results['streams'])) : [];

        $page = $request->get('page', 1);

        $recs_per_page_opts = config('records-sets.per-page.options');
        $records_per_page = (Cookie::get('records_per_page')) ? Cookie::get('records_per_page') : array_shift($recs_per_page_opts);

        // Update records per page var and cookie, if the user select an option
        if($request->has('rpp') && in_array($request->get('rpp'), config('records-sets.per-page.options'))){
            Cookie::queue('records_per_page', $request->get('rpp'), 1440);

            $records_per_page = $request->get('rpp');
        }

        $offset = ($page * $records_per_page) - $records_per_page;


        $streams = new LengthAwarePaginator(array_slice($streams, $offset, $records_per_page, true), count($streams), $records_per_page, $page);


        return view(
            'welcome',
            compact(
                'streams'
            )
        );
    }


    /**
     * Shows a channel's stream.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStream($channel){
        $result = TwitchApi::liveChannel($channel);

        if(!empty($result->error)) {
            abort(404);
        }

        $stream = json_decode(json_encode($result['stream']));

        return view(
            'stream',
            compact(
                'stream'
            )
        );
    }
}
