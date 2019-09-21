<?php
/* /src/Controller/HomeController.php */
namespace App\Controller;

use App\Service\Recipe;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @param Recipe $RecipeService
     * @return Response
     */
    public function index(Recipe $RecipeService)
    {
        $titleRecipe = 'Cheese';

        $recipes = $RecipeService->searchRecipe($titleRecipe);
        
        return new Response( $recipes );
    }
}