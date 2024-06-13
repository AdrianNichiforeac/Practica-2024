<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.home', [

        ]);
    }
}
