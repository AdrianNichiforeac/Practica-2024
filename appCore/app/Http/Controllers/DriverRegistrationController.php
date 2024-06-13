<?php

namespace App\Http\Controllers;

use App\Mail\DriverInsertMail;
use App\DriverRegistration;
use App\Mail\ContactForm;
use App\News;
use App\Page;
use App\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DriverRegistrationController extends Controller
{
    public function index()
    {

        $states = States::all();
        $last_news = News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->limit(5)
            ->get();

        $details = Page::where('link_name', 'driver_registration')->get();

        return view('frontend.registrations.driver', compact('last_news', 'states', 'details'));
    }

    public function registrationPost(Request $request){

        $inputs = $this->validate($request, [
            'name' => 'required',
            'surname' => '',
            'email' => '',
            'phone' => '',
            'dob' => '',
            'address' => '',
            'city' => '',
            'state_id' => '',
            'zip_code' => '',
            'experience' => '',
            'cdl_back' => '',
            'cdl_front' => '',
            'medical_file' => '',
        ]);

        $cdlBackFile = $request->file('cdl_back');
        $cdlFrontFile = $request->file('cdl_front');
        $medicalFile = $request->file('medical_file');

        if ($cdlBackFile) {
            $cdlBackFilename = $cdlBackFile->getClientOriginalName();
            $cdlBackFile->storeAs('public/drivers/cdl_back', $cdlBackFilename);
            $inputs['cdl_back'] = $cdlBackFilename;
        }

        if ($cdlFrontFile) {
            $cdlFrontFilename = $cdlFrontFile->getClientOriginalName();
            $cdlFrontFile->storeAs('public/drivers/cdl_front', $cdlFrontFilename);
            $inputs['cdl_front'] = $cdlFrontFilename;
        }

        if ($medicalFile) {
            $medicalFilename = $medicalFile->getClientOriginalName();
            $medicalFile->storeAs('public/drivers/medical_files', $medicalFilename);
            $inputs['medical_file'] = $medicalFilename;
        }

        $driver_request = DriverRegistration::create($inputs);

        $email_trimitere = trans("link.email_administrativ");

        \Illuminate\Support\Facades\Mail::to($email_trimitere)->send(new DriverInsertMail($driver_request));

        return back()->with('success', 'Thanks for registrations!');
    }
}
