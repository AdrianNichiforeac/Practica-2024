<?php

namespace App\Http\Controllers;

use App\CategoryPlace;
use App\Image;
use App\ImageModel;
use App\News;
use App\NewsTranslation;
use App\Project;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $query = News::where('active', 1);
        $news = $query
            ->orderBy('data', 'DESC')
            ->paginate(18);

        return view('frontend.news', compact('news'));
    }

    public function newsDetail(News $news)
    {
        $news_detail = $news;

        $last_news =  News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->limit(5)
            ->get();

        return view('frontend.news', compact('news_detail', 'last_news'));
    }

}
