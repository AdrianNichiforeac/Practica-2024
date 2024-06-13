<?php

namespace App\Http\Controllers\Admin;

use App\Classes\ImageLogic;
use App\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posters.index', ['posters' => Poster::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posters.create', ['posters' => Poster::all()]); // //
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
            'description' => ['nullable'],
            'link' => ['nullable'],
            'picture' => ['mimes:jpeg,bmp,png'],
        ]);

        if (request('picture')){
            $inputs['picture'] = request('picture')->store('public/posters');
        }

        $poster = new Poster();
        $poster_id = $poster->create($inputs)->id;

        return redirect()->route('posters.edit', $poster_id); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {
        //
    }

    public function changeStatus(Poster $poster, $feat){
        $feat = (int)$feat;
        $poster->update(['active'=> $feat]);
        return redirect()->route('posters.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poster  $posters
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', ['poster' => $poster]); //
    }

    public function storeImageGeneral(Request $request, Poster $poster){
        request()->validate([
            'picture'  => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        Storage::delete($poster->picture);



        $image = new ImageLogic();
        $image -> originalImage = $request->file('picture');
        $image -> path = '/posters/';
        $image->length = 1600;
        $image->height = 600;
        $image -> storeImage();
        $inputs['picture'] = $image->pictureLink;

        $poster->update($inputs);
        echo asset('storage/'.$inputs['picture']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poster  $posters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'en_name' => 'max:255',
            'en_description' => '',
            'ro_name' => 'max:255',
            'ro_description' => '',
            'ru_name' => 'max:255',
            'ru_description' => '',
            'link' => 'max:255',


        ]);
        $poster_data = [
            'en' => [
                'name'       => $request->input('en_name'),
                'description' => $request->input('en_description')
            ],
            'ro' => [
                'name'       => $request->input('ro_name'),
                'description' => $request->input('ro_description')
            ],
            'ru' => [
                'name'       => $request->input('ru_name'),
                'description' => $request->input('ru_description')
            ],
            'link' => $request->input('link'),
        ];

        $poster = Poster::findOrFail($request->id);
        $poster->update($poster_data);
        return redirect()->route('posters.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poster  $posters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster,  Request $request)
    {
        Storage::delete($poster->picture);
        $poster->delete();
        $request->session()->flash('deleted', 'Baner-ul cu id-ul: ' . $poster->id . ' a fost șters');
        return back();//
    }

}
