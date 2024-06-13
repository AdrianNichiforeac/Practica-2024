<?php
namespace App\Classes;

use App\CategoryPlace;

class FooterInfo{

    /**
     * Get all Links Government
     * @return mixed
     */
    public static function getLinkCategoryPlace(){
        $links_category_places = CategoryPlace::where('active', 0)
            ->orderBy('id')
            ->get();

        return $links_category_places;
    }


}
