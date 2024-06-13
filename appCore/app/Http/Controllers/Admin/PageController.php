<?php

namespace App\Http\Controllers\Admin;

use App\Classes\ImageLogic;
use App\Page;
use App\Image;
use App\File;
use App\PageTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', ['pages' => Page::where('parent', NULL)->orderBy('ord')->get()]); //
    }

    /**
     * Store new page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $inputs = request()->validate([
            'name' => ['string', 'max:255'],
            'content' => ['nullable'],
            'link_name' => ['max:255'],

        ]);

        $page_data = [
            'en' => [
                'name'       => $inputs['name'],
            ],
            'ro' => [
                'name'       => $inputs['name'],
            ],
            'ru' => [
                'name'       => $inputs['name'],
            ],
            'link_name' => Str::of($inputs['name'])->slug('-')
        ];

        $page = new Page();
        $page_id = $page->create($page_data)->id;

        return redirect()->route('pages.edit', $page_id); //

    }

    /**
     * View edit page
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]); //
    }

    /**
     * Updating page
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
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
            'link_name' => 'max:255',
        ]);
        $page_data = [
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
            'link_name' => $request->input('link_name')
        ];

        $page = Page::findOrFail($request->id);


        $page->update($page_data);

        return redirect()->route('pages.index');

    }

    /**
     * Remove page
     * @param Page $page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Page $page, Request $request)
    {
        Storage::delete($page->picture);
        $page->delete();
        $request->session()->flash('deleted', 'Pagina cu id-ul: ' . $page->id . ' a fost șters');
        return redirect()->route('pages.index');
    }

    /**
     * Change active or not for first menu (feat/unfeat)
     * @param Page $page
     * @param $feat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setFirstMenu(Page $page, $feat){
        $feat = (int)$feat;
        $page->update(['first_menu'=>$feat]);
        return redirect()->route('pages.index');
    }

    /**
     * Change active or not for second menu (feat/unfeat)
     * @param Page $page
     * @param $feat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setSecondMenu(Page $page, $feat){
        $feat = (int)$feat;
        $page->update(['second_menu'=>$feat]);
        return redirect()->route('pages.index');
    }

    /**
     * AjaxRequest. Order pages and set parents.
     * Recursive Method
     * @param int $parent
     * @param array $childrens
     */
    public function orderPages($parent=NULL, $childrens=array()){
        if (!empty($childrens)){
            $pages_arr=$childrens;
        }else {
            $pages_arr = json_decode(request()->JSON);
        }
        $order = 0;
        for($i=0; $i<count($pages_arr); $i++){
            $order++;
            $page_id = $pages_arr[$i]->id;
            $page = Page::where('id', $page_id)->first();
            $page->update(['ord'=>$order, 'parent'=>$parent]);
            if (isset($pages_arr[$i]->children)) {
                $this->orderPages($page_id, $pages_arr[$i]->children);
            }
        }

    }

    /**
     * Change main image
     * @param Request $request
     * @param Page $page
     */
    public function storeImageGeneral(Request $request, Page $page){
        request()->validate([
            'picture'  => 'required|mimes:jpeg,bmp,png,jpg',
            'picture_small'  => 'mimes:jpeg,bmp,png,jpg',
        ]);
        Storage::delete($page->picture);

        $image = new ImageLogic();
        $image -> originalImage = $request->file('picture');
        $image -> path = '/pages/';
        $image -> storeImage();
        $inputs['picture'] = $image->pictureLink;

        $image_small = new ImageLogic();
        $image_small -> originalImage = $request->file('picture');
        $image_small -> path = '/small_pages/';
        $image_small->length = 360;
        $image_small->height = 250;
        $image_small -> storeImage();
        $inputs['picture_small'] = $image_small->pictureLink;

        $page->update($inputs);
        echo asset('storage/'.$inputs['picture']);
    }
}
