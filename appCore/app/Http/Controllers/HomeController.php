<?php

namespace App\Http\Controllers;


use App\CategoryPlace;
use App\Image;
use App\ImageModel;
use App\News;
use App\Partner;
use App\Person;
use App\Place;
use App\Poster;
use App\Page;
use App\Department;
use App\Employee;
use App\Role;
use App\States;
use App\Task;
use App\Translatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function home()
    {
        $posters = Poster::where('active', 1)
            ->where('link', '<>', '')
            ->orderBy('id')
            ->get();

        $news = News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->get();

        $states = States::all();
        return view('frontend.home', compact( 'posters', 'news', 'states')
        );
    }

    public function sendEmail(Request $request){

        $details = (object)array();
        $details->name = $request->name;
        $details->last_name = $request->last_name;
        $details->email = $request->email;
        $details->phone = $request->phone;
        $details->message = $request->message;

        $email_trimitere = trans("link.email_administrativ");

        \Mail::to($email_trimitere)->send(new \App\Mail\Mail($details));

        return redirect()->route('home');
    }



}
