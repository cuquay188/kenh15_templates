<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with(['fail' => 'Your username or password is incorrect.']);
        }
        return redirect()->route('article');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getSignUp()
    {
        return view('admin.auth.signup');
    }

    public function getUserManagement()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.info.user');
    }

    public function postEditUser(Request $request)
    {
        $id = $request->id;
        $fullname = $request->fullname;
        $email = $request->email;
        $tel = $request->tel;
        $new_password = $request->new_password;

//        ----------- Change password -----------
        $user = Auth::user(); 
        $current_password = $request->current_password;

        if (strlen($current_password) == 0) {
            $this->validate($request, [
                'current_password' => 'required',
            ]);
        }

//        If current_password don't match with password in database -> throw error
        if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password))
            return redirect()->back()->with(['fail' => 'Your current password is incorrect.']);

//        If current_password match with password in database -> replace by new_password and save
        $user->password = Hash::make($new_password);
        $user->save();

//        ----------- End Change password -----------

        User::where('id', $id)->update([
            'fullname' => $fullname,
            'email' => $email,
            'tel' => $tel,
        ]);
        return redirect()->back();
    }
}
