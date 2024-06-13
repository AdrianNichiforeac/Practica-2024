<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admins.index', ['admins' => Admin::all(), 'roles' => Role::all()]);
    }

    public function store(){
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $admin = new Admin();
        $admin->create($inputs);

        return redirect()->route('admins.index');
    }



    public function update(Admin $admin){
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255']
        ]);

        if (request('password')){
            $inputs['password'] = request('password');
        }

        $admin->update($inputs);
        return redirect()->route('admins.index');
    }

    public function changeStatus(Admin $admin, $feat){
        $feat = (int)$feat;
        $admin->update(['active'=> $feat]);
        return redirect()->route('admins.index');
    }

    public function destroy(Admin $admin, Request $request)
    {
        $admin->delete();
        $request->session()->flash('deleted', 'Administratorul cu id-ul: ' . $admin->id . ' a fost șters');
        return back();
    }
}
