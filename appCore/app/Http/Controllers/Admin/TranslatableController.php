<?php

namespace App\Http\Controllers\Admin;

use App\Translatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\TranslationLoader\LanguageLine;
use Illuminate\Support\Facades\Input;

class TranslatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $query_lang = LanguageLine::query();

        if ($request->input('text')) {
            $text = $request->input('text');
            $query_lang->where('text', 'LIKE', "%$text%");
        }
        if ($request->input('key')) {
            $key = $request->input('key');
            $query_lang->where('key', 'LIKE', "%$key%")
                ->orWhere('group', 'LIKE', "%$key%");
        }


        $constantes = $query_lang->orderBy('group')->orderBy('key')->paginate(20);

        $groups = LanguageLine::select('group')->distinct('group')->orderBy('group', 'DESC')->get();

        return view('admin.translatable.index', compact('constantes', 'groups', 'data'));


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $edit=LanguageLine::where('id', $request->id)->first();
        return view('translate', ['edit' => $edit]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $constantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'group' => 'required|max:255',
            'key' => 'required|max:255',
            'en' => 'required',
            'ro' => 'required',
            'ru' => 'required',
        ]);
        $constantes = LanguageLine::findOrFail($id);
        $constantes->group = $request->input('group');
        $constantes->key = $request->input('key');
        $constantes->text = ['en' => $request->input('en'), 'ro' => $request->input('ro'), 'ru' => $request->input('ru')];

        $constantes->save();
        return redirect()->route('translate.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function insert(Request $request)
    {
        $request->validate([
            'group' => 'required|max:255',
            'key' => 'required|max:255',
            'en' => 'required',
            'ro' => 'required',
            'ru' => 'required',
        ]);
        LanguageLine::create([
            'group' => $request->input('group'),
            'key' => $request->input('key'),
            'text' => ['en' => $request->input('en'), 'ro' => $request->input('ro'), 'ru' => $request->input('ru')],
        ]);
        Session::flash('success', 'You have successfully added item.');

        return redirect()->route('translate.index');

    }

    public function destroy(Translatable $constantes, Request $request)
    {
        $constantes->delete();
        $request->session()->flash('deleted', 'Constanta cu id-ul: ' . $constantes->id . ' a fost șters');
        return back();
    }
}
