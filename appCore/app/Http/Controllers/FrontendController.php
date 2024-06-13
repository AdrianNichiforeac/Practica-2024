<?php

namespace App\Http\Controllers;


use App\Image;

use App\Page;
use App\Department;
use App\Employee;
use App\Task;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function language(string $language)
    {
        Session::put('locale',$language);
        return redirect()->back();
    }
public function way()
{
    return  $pane_title = Page::where('first_menu', 1)
        ->orWhere('second_menu', 1)
        ->orderBy('id')->get();
}


}
