<?php
/* /src/Controller/ApiController.php */
namespace App\Controller;

use App\Service\Recipe;
use App\Service\ListRecipes;
use Symfony\Component\HttpFoundation\Response;

class ApiController
{
    /**
     * @param Recipe    $RecipeService
     * @return JsonResponse
     */
    public function search(Recipe $RecipeService)
    {
        $titleRecipe = 'Vegetarian' ;
        $ingredients = '';

        $recipes = $RecipeService->searchRecipe($titleRecipe,$ingredients,1);
        
        return new Response($recipes);
    }

    /**
     * @param Recipe        $RecipeService
     * @param ListRecipes   $ListRecipes
     * @param int           $page
     * @return string       $html
     */
    public function recipes(Recipe $RecipeService,ListRecipes $ListRecipes, int $page=1)
    {
        $titleRecipe = 'Vegetarian' ;
        $ingredients = 'Pesto';

        $recipes = $RecipeService->searchRecipe($titleRecipe,$ingredients,$page);
        
        $recipesArray = json_decode($recipes) ;
        
        //print("<pre>".print_r($recipesArray,true)."</pre>"); exit();
        $html = $ListRecipes->list($recipes) ;

        return new Response($html);
    }
}