<?php

namespace App\Http\Controllers;
use App\Image;
use App\News;
use App\NewsTranslation;
use App\GalleryPost;
use App\GalleryPostTranslation;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        return view('frontend.gallery', [
            'gallery' => GalleryPost::where('active', 1)
                ->orderBy('id')
                ->get(),
        ]);
    }
    public function galleryDetail(GalleryPost $galleryPost)
    {
        return view('frontend.gallery', [
            'gallery_detail' => $galleryPost,
            'recent_gallery' => Image::orderBy('id', 'DESC')
                ->limit(6)
                ->get(),
            'last_news' => News::where('active', 1)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get(),
        ]);
    }
}
