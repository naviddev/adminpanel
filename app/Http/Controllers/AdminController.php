<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(Request $request){
        $admin=\App\Admin::findOrFail($request->user('admin')->id);
    	return view('admin.dashboard',compact('admin'));
    }

    public function changepassword(Request $request)
    {

        $user = \App\Admin::findOrFail($request->user('admin')->id);
        $validation = Validator::make($request->all(), [
            'password' => 'required|different:oldpassword|confirmed'
        ]);

        if ($validation->fails()) {
           // return redirect()->back()->withErrors($validation->errors());
            return $validation->errors();
        }
        if (Hash::check($request->oldpassword, $user->password))
        {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect('/admin');
        }
        return "no";

        }

    public function setting(Request $request)
    {
        $admin=\App\Admin::find($request->user('admin')->id);

      ;
        return view('admin.setting',compact('admin'));
        
    }

    public function settingUpdate(Request $request)
    {
        $admin = \App\Admin::findOrFail($request->user('admin')->id);
        $valid = Validator::make($request->all(), [

            'FName' => 'required|max:255',
            'LName' => 'required|max:255',


        ]);
        if ($valid->fails()) {
            return $valid->messages();
        } else {
            if ($request->FName != $admin->FName) {
                $admin->FName = $request->FName;
            }
            if ($request->LName != $admin->LName) {
                $admin->LName = $request->LName;
            }


            $admin->save();
            flash("setting Update");
            if (File::glob('uploads\AdminPic\navid.*')) {
                File::Delete('uploads\AdminPic\navid.jpg');
                AdminUpload($request);
            }else AdminUpload($request);

        }
      return  redirect('/admin/setting');
    }

    public function changepasswordshow()
    {
        return view('admin.auth.passwords.resetmanual');

    }

    public function inbox(Request $request)
    {
        $mails=\App\mail::where('admin_id', $request->user('admin')->id)->get();
        
        return view('admin.mail.inbox',compact('mails'));
    }

    public function mail($id,Request $request)
    {

        $mail=\App\mail::findorfail($id);
       if ($mail->read==0) {
           $mail->read=1;

           $mail->save();
       }
       
        return view('admin.mail.mail',compact('mail'));
    }

    public function send(Request $request)
    {
        $admin=\App\Admin::where('username', $request->username)->count();
        if ($admin==1){
            $admin=\App\Admin::where('username', $request->username)->first();
            $mail=new \App\mail;
            $mail->admin_id=$admin->id;
            $mail->sender=$request->user('admin')->username;
            $mail->body=$request->body;
            $mail->subject=$request->subject;
            $mail->type=$request->type;
            $mail->created_at=\Carbon\Carbon::now();
            $mail->read=0;
            $mail->save();
            flash("message sent");
            return redirect('/admin/mail/inbox');
        }
        return back();

    }

    public function compose()
    {
        return view('admin.mail.compose');
    }

    public function mailDelete($id,Request $request)
    {
        $mail=\App\mail::findorfail($id);
        if ($request->user('admin')->id==$mail->admin_id){
            $mail->delete();
            flash("message Deleted");
        }else abort(404);
        return redirect('/admin/mail/inbox');
    }

    public function MailRead(Request $request)
    {

        $mails=\App\mail::where('admin_id', $request->user('admin')->id)->get();
        
        return view('admin.mail.read',compact('mails'));
    }

    public function mailSent(Request $request)
    {
        $mails=\App\mail::where('sender',$request->user('admin')->username)->get();
        return view('admin.mail.read',compact('mails'));

    }

    public function UsersShow()
    {
        $users=\App\User::all();
        return view('admin.users.users',compact('users'));
        
    }

    public function UserShow($id)
    {
        $user=\App\User::find($id);
        return view('admin.users.user',compact('user'));
    }

    public function UserUpdate(Request $request,$id)
    {
        $user=\App\User::find($id);
        $valid=Validator::make($request->all(), [

            'FName' => 'required|max:255',
            'LName' => 'required|max:255',


        ]);
        if ($valid->fails()){
            return $valid->messages();
        }else {
            if ($request->FName!=$user->FName){
                $user->FName=$request->FName;
            }
            if ($request->LName!=$user->LName) {
                $user->LName = $request->LName;
            }


            $user->save();
            flash("info update successfully","success");
        }
        return back();

}

    public function UserDeleteShow()
    {
        $users=\App\User::all();
        return view('admin.users.delete',compact('users'));
        

    }

    public function UserDelete($id)
    {
        $user=\App\User::find($id);
        $user->delete();
        flash("User Deleted ","danger");
        return back();
    }

    public function UserVipShow()
    {
        $users=\App\User::all();
        return view('admin.users.vip',compact('users'));

    }

    public function UserVip($id)
    {$user=\App\User::find($id);
        if ($user->vip==0){
            $user->vip=1;
        }else $user->vip=0;
            $user->save();
        flash("setting changed ","success");
        return back();

        
}

   


}
