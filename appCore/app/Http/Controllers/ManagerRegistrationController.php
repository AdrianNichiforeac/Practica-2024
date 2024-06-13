<?php

namespace App\Http\Controllers;

use App\Mail\ManagerInsertMail;
use App\Mail\OperatorInsertMail;
use App\ManagerRegistration;
use App\News;
use App\States;
use Illuminate\Http\Request;

use Mail;

class ManagerRegistrationController extends Controller
{
    public function index()
    {

        $states = States::all();
        $last_news = News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->limit(5)
            ->get();

        return view('frontend.registrations.manager', compact('last_news', 'states'));
    }

    public function registrationPost(Request $request){

        $inputs = $this->validate($request, [
            'name' => 'required',
            'surname' => '',
            'email' => '',
            'phone' => '',
            'dob' => '',
            'position_interested' => '',
            'years_of_experience' => '',
            'wage_expectation' => '',
            'cv_file' => '',
        ]);

        $file = $request->file('cv_file');

        if ($file) {
            // Generați un nume unic pentru fișierul încărcat
            $filename = $request->file('cv_file')->getClientOriginalName();

            // Salvați fișierul în directorul public/cv_files
            $request->file('cv_file')->storeAs('public/managers/cv_files', $filename);

            // Salvați numele fișierului în baza de date
            $inputs['cv_file'] = $filename;
        }

        $manager_request = ManagerRegistration::create($inputs);

        $email_trimitere = trans("link.email_administrativ");

        \Illuminate\Support\Facades\Mail::to($email_trimitere)->send(new ManagerInsertMail($manager_request));

        return back()->with('success', 'Thanks for registrations!');
    }
}
