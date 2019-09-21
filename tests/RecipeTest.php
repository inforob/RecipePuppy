<?php

namespace App\Tests;

use App\Service\Recipe;
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    public function testNotFindedRecipe()
    {
        $RecipeService = new Recipe();

        $recipes = $RecipeService->searchRecipe('ssss');
        
        $arrayResponse = json_decode($recipes) ;
        $countRecipes  = count($arrayResponse->results) ;

        $this->assertEquals(0, $countRecipes);
    }

    public function testFindedRecipe()
    {
        $RecipeService = new Recipe();

        $recipes = $RecipeService->searchRecipe('Vegetables');
        
        $arrayResponse = json_decode($recipes) ;
        $countRecipes  = count($arrayResponse->results) ;

        $this->assertGreaterThan(0,$countRecipes);
    }
}
