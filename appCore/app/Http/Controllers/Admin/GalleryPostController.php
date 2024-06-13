<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\GalleryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryPost = GalleryPost::all()->sortByDesc('id');
        return view('admin.gallery_posts.index', ['gallery' => $galleryPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);

        $galleryPost = new GalleryPost();
        $galleryPost_id = $galleryPost->create($inputs)->id;

        return redirect()->route('gallery_posts.edit', $galleryPost_id); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryPost  $galleryPost
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryPost $galleryPost)
    {
        //
    }


    public function changeStatus(GalleryPost $galleryPost, $feat){
        $feat = (int)$feat;
        $galleryPost->update(['active'=> $feat]);
        return redirect()->route('gallery_posts.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryPost  $galleryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryPost $galleryPost)
    {
        return view('admin.gallery_posts.edit', ['gallery' => $galleryPost]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryPost  $galleryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'en_name' => 'max:255',
            'ro_name' => 'max:255',
            'ru_name' => 'max:255',
        ]);

        $galleryPost_data = [
            'en' => [
                'name'       => $request->input('en_name'),
            ],
            'ro' => [
                'name'       => $request->input('ro_name'),
            ],
            'ru' => [
                'name'       => $request->input('ru_name'),
            ],
        ];

        if (request('picture')){
            Storage::delete(request('picture'));;
            $galleryPost_data['picture'] = request('picture')->store('public/gallery_posts');
        }

        $galleryPost = GalleryPost::findOrFail($request->id);
        $galleryPost->update($galleryPost_data);
        return redirect()->route('gallery_posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryPost  $galleryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GalleryPost $galleryPost)
    {
        Storage::delete($galleryPost->picture);
        $galleryPost->delete();
        $request->session()->flash('deleted', 'Galeria cu id-ul: ' . $galleryPost->id . ' a fost șters');
        return back();
    }

    public function storeImageGeneral(Request $request, GalleryPost $galleryPost){
        request()->validate([
            'picture'  => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        Storage::delete($galleryPost->picture);
        $inputs['picture'] = request('picture')->store('public/gallery_posts');
        $galleryPost->update($inputs);
        echo asset('storage/'.$inputs['picture']);
    }
}
