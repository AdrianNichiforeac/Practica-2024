<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.language.index', ['language' => Language::all()]); //
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
    public function store()
    {
        $inputs = request()->validate([
            'locale' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],

        ]);

        $language = new Language();
        $language->create($inputs);

        return redirect()->route('language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Language $language)
    {
        $inputs = request()->validate([
            'locale' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
        ]);
        $language->update($inputs);
        return redirect()->route('language.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language, Request $request)
    {
        $language->delete();
        $request->session()->flash('deleted', 'Limba cu id-ul: ' . $language->id . ' a fost șters');
        return back();
    }
}
