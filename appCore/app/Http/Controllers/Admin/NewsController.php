<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageLogic;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()->sortByDesc('data');
        return view('admin.news.index', ['news' => $news]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'name' => ['string', 'max:255'],
            'data' => ['nullable'],
        ]);

        $news_data = [
            'en' => [
                'name'       => $inputs['name'],
            ],
            'ro' => [
                'name'       => $inputs['name'],
            ],
            'ru' => [
                'name'       => $inputs['name'],
            ],
            'data' => $inputs['data'],
        ];

        $news = new News();
        $news_id = $news->create($news_data)->id;

        return redirect()->route('news.edit', $news_id); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    public function changeStatus(News $news, $feat){
        $feat = (int)$feat;
        $news->update(['active'=> $feat]);
        return redirect()->route('news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'en_name' => 'max:255',
            'en_content' => '',
            'ro_name' => 'max:255',
            'ro_content' => '',
            'ru_name' => 'max:255',
            'ru_content' => '',
            'data' => 'date',
            'parent' => '',
        ]);

        $news_data = [
            'en' => [
                'name'       => $request->input('en_name'),
                'content' => $request->input('en_content')
            ],
            'ro' => [
                'name'       => $request->input('ro_name'),
                'content' => $request->input('ro_content')
            ],
            'ru' => [
                'name'       => $request->input('ru_name'),
                'content' => $request->input('ru_content')
            ],
            'data' => $request->input('data'),
            'parent' => $request->input('parent'),
        ];

        /**Modulul de rescriere a imaginilor
         *
        if (request('picture')){
            Storage::delete(request('picture'));;
            $news_data['picture'] = request('picture')->store('public/news');
        }
         * */

        $news = News::findOrFail($request->id);
        $news->update($news_data);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, Request $request)
    {
        Storage::delete($news->picture);
        $news->delete();
        $request->session()->flash('deleted', 'Noutatea cu id-ul: ' . $news->id . ' a fost șters');
        return back();
    }

    public function storeImageGeneral(Request $request, News $news){
        request()->validate([
            'picture'  => 'required|mimes:jpeg,bmp,png,jpg',
            'picture_small'  => 'mimes:jpeg,bmp,png,jpg',
        ]);
        Storage::delete($news->picture);

        $image = new ImageLogic();
        $image -> originalImage = $request->file('picture');
        $image -> path = '/news/';
        $image -> storeImage();
        $inputs['picture'] = $image->pictureLink;

        $image_small = new ImageLogic();
        $image_small -> originalImage = $request->file('picture');
        $image_small -> path = '/small_news/';
        $image_small->length = 360;
        $image_small->height = 250;
        $image_small -> storeImage();
        $inputs['picture_small'] = $image_small->pictureLink;

        $news->update($inputs);
        echo asset('storage/'.$inputs['picture']);
    }
}
