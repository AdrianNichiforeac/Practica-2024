<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Image;
use App\ImageModel;
use App\News;
use App\Project;
use App\States;
use Illuminate\Http\Request;
use App\Page;
use App\Translatable;

class Page_fController extends Controller
{
    public function page($linkName)
    {
        $page = Page::where('link_name', $linkName)
            ->where(function($query){
                $query->where('first_menu', 1)
                    ->orWhere('second_menu', 1);
            })
            ->first();
        if (!$page) return abort(404);


        $states = States::all();
        $news = $page->activeNews();
        $last_news = News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->limit(5)
            ->get();

        return view('frontend.page_f',  compact(  'page', 'news', 'last_news', 'states' )
        );
    }
}
