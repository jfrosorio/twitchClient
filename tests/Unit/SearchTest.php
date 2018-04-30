<?php

namespace Tests\Unit;

use App\Lib\MyTwitchApi\Search;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * Check if streams search returns an array with two values.
     *
     * @return void
     */
    public function testSearchStreams()
    {
        $needle = 'php';

        $options = [
            'query'  => $needle,
            'limit' => 100
        ];

        $results = Search::streams($options);

        // It's expected $results to be an array with two indexes: 'total' and 'streams'
        $this->assertCount(2, $results);
    }
}
