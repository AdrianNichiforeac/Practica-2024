<?php

namespace App\Http\Controllers;

use App\Mail\OperatorInsertMail;
use App\OperatorRegistration;
use App\News;
use App\States;
use Illuminate\Http\Request;

use Mail;

class OperatorRegistrationController extends Controller
{
    public function index()
    {

        $states = States::all();
        $last_news = News::where('active', 1)
            ->orderBy('data', 'DESC')
            ->limit(5)
            ->get();

        return view('frontend.registrations.operator', compact('last_news', 'states'));
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
            $cdlBackFile->storeAs('public/operators/cdl_back', $cdlBackFilename);
            $inputs['cdl_back'] = $cdlBackFilename;
        }

        if ($cdlFrontFile) {
            $cdlFrontFilename = $cdlFrontFile->getClientOriginalName();
            $cdlFrontFile->storeAs('public/operators/cdl_front', $cdlFrontFilename);
            $inputs['cdl_front'] = $cdlFrontFilename;
        }

        if ($medicalFile) {
            $medicalFilename = $medicalFile->getClientOriginalName();
            $medicalFile->storeAs('public/operators/medical_files', $medicalFilename);
            $inputs['medical_file'] = $medicalFilename;
        }

        $operator_request = OperatorRegistration::create($inputs);

        $email_trimitere = trans("link.email_administrativ");
        \Illuminate\Support\Facades\Mail::to($email_trimitere)->send(new OperatorInsertMail($operator_request));

        return back()->with('success', 'Thanks for registrations!');
    }
}
