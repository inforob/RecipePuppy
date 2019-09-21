<?php

namespace App\Service;


class ListRecipes
{
    /**
     * return a html raw string content      
     * @param array $recipes
     * @return string $htmlContent
     */
    public static function list( $recipes ) : string
    {
        $recipesArray = json_decode($recipes) ;

        $elementHtml = '<ul style="list-style:none">' ;

        if(count($recipesArray->results)>0) {
            foreach($recipesArray->results as $recipe) {
                $elementHtml .= '<li style="padding-top:1em;"><a href="' . $recipe->href . '">' . $recipe->title . '</a></li>' ;
                if (!empty($recipe->thumbnail)) {
                    $imgElement = '<img src="'. $recipe->thumbnail .'" alt="'.$recipe->title.'" title="'.$recipe->title.'">' ;
                    $elementHtml .= '<li>'. $imgElement .'</li>' ;
                }
    
            }
        } else {
            $elementHtml .= '<li>No records found.</li>' ;
        }

        $elementHtml .= '</ul>' ;

        return $elementHtml ;

    }
}