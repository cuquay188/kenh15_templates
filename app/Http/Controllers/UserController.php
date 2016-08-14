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

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:5|max:30|unique:users,username',
            'password' => 'required|min:3|max:16',
            'tel'=>'required|unique:users,tel'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $tel = $request->tel;
        $username = $request->username;
        $password = $request->password;

        $user = new User();
        $user->fullname = $fullname;
        $user->email = $email;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->tel = $tel;

        $user->save();

        return redirect()->route('login')
                         ->with([
                            'new_username' => $username,
                            'new_password' => $password
                         ]);
    }

    public function getUserManagement()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.users.user');
    }

    public function postUpdateUser(Request $request)
    {
        $id = $request->id;
        $fullname = $request->fullname;
        $email = $request->email;
        $tel = $request->tel;

        User::where('id', $id)->update([
            'fullname' => $fullname,
            'email' => $email,
            'tel' => $tel
        ]);

        return redirect()->back();
    }

    public function postChangePasswordUser(Request $request)
    {
        $new_password = $request->new_password;

//        ----------- Change password -----------
        $user = Auth::user();
        $current_password = $request->current_password;

        $this->validate($request, [
            'current_password' => 'required',
        ]);
//        If current_password don't match with password in database -> throw error
        if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password))
            return redirect()->back()->with(['fail' => 'Your current password is incorrect.']);

//        If current_password match with password in database -> replace by new_password and save
        $user->password = Hash::make($new_password);
        $user->save();

//        ----------- End Change password -----------
//

        return redirect()->back();
    }
}
