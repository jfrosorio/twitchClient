<?php

namespace App\Lib\MyTwitchApi;

use TwitchApi;
use Zarlach\TwitchApi\API\Search as TwitchApiSearch;


class Search extends TwitchApiSearch
{
    /**
     * Search streams.
     *
     * @param $options
     * @return mixed
     */
    public static function streams($options)
    {
        $availableOptions = ['query', 'limit', 'offset'];

        return TwitchApi::sendRequest('GET', 'search/streams', false, $options, $availableOptions);
    }
}