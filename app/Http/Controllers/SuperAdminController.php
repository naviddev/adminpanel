<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests;

class SuperAdminController extends Controller
{
    public function __construct(){
        $this->middleware('SAdmin');
    }
    public function index(Request $request)
    {
        $admins=\App\Admin::all();
        return view('admin.superadmin.dashboard',compact('admins'));
    }

    public function showSetForm()
    {
     
        
        return view('admin.auth.register');
    }

    public function SetForm(Request $request)
    {

        $valid=Validator::make($request->all(), [
            'username' => 'required|max:255|unique:admins,username',
            'FName' => 'required|max:255',
            'LName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($valid->fails()){
            return $valid->messages();
        }else {
           Admin::create([
            'username' => $request['username'],
            'SuperAdmin' => 0,
            'FName' => $request['FName'],
            'LName' => $request['LName'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        }

        flash("new admin created successfully","success");
       return redirect('/superadmin');
    }

    public function adminsShow($id,Request $request)
    {
        $admin=\App\Admin::findOrFail($id);
        
        return view('admin.superadmin.admin',compact('admin'));
    }

    public function adminsUpadte($id,Request $request)
    {
        $admin=\App\Admin::findOrFail($id);
        $valid=Validator::make($request->all(), [

            'FName' => 'required|max:255',
            'LName' => 'required|max:255',


        ]);
        if ($valid->fails()){
            return $valid->messages();
        }else {
            if ($request->FName!=$admin->FName){
                $admin->FName=$request->FName;
            }
            if ($request->LName!=$admin->LName) {
                $admin->LName = $request->LName;
            }


            $admin->save();
            flash("info update successfully","success");
        }
        return back();
    }

    public function adminsDelete($id)
    {
        $admin=\App\Admin::findOrFail($id);
        $admin->delete();
       flash("Admin Deleted ","danger");
        return back();
    }

    public function adminsDeleteShow()
    {
        $admins=\App\Admin::all();

        return view('admin.superadmin.delete',compact('admins'));
   }

    public function adminsFeatureShow()
    {$admins=\App\Admin::all();
        return view('admin.superadmin.adminF',compact('admins'));
    }

    public function adminsFeature($id)
    {
        $admin=\App\Admin::findOrFail($id);
        return view('admin.superadmin.features',compact('admin'));
    }
}
