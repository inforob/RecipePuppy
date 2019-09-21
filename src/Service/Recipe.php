<?php
/* /src/Service/DniGenerator.php */
namespace App\Service;

use GuzzleHttp;
use GuzzleHttp\Psr7\Stream;

class Recipe
{
    
    /**
     * return a json recipes
     * 
     * @param string $searchStringRecipe
     * @return array([json])
     */
    public static function searchRecipe(string $searchStringRecipe = '' ) : Stream
    {;
        // set the Optional Parameter [ q : normal search query ]
        // set http://www.recipepuppy.com/about/api/
        $qParameter = ['q' => $searchStringRecipe ] ;

        $params = [
            'query' => $qParameter
        ];

        // create a client with a base URI
        $client = new GuzzleHttp\Client(['base_uri' => 'http://www.recipepuppy.com']);
        // send a request to api
        $response = $client->request('GET', 'api', $params );
        // return response 
        return $response->getBody();
    }
}