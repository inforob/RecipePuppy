<?php

namespace App\Service;

use GuzzleHttp;
use GuzzleHttp\Psr7\Stream;

class Recipe
{
    const URL = 'http://www.recipepuppy.com';
    /**
     * return a json recipes
     * 
     * @param  string $searchStringRecipe
     * @return \GuzzleHttp\Psr7\Stream;
     */
    public static function searchRecipe(string $StringRecipe, string $StringIngredients, int $page = 1 ) : Stream
    {
        // set the Optional Parameter [ q : normal search query ]
        // set http://www.recipepuppy.com/about/api/
        $qParameter = ['q' => $StringRecipe , 'i' => $StringIngredients , 'p' => $page ] ;

        $params = [
            'query' => $qParameter
        ];

        // create a client with a base URI
        $client = new GuzzleHttp\Client(['base_uri' => self::URL]);
        // send a request to api
        $response = $client->request('GET', 'api', $params );
        // return response 
        return $response->getBody();
    }
}