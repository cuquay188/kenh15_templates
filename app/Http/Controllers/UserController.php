<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getLogin()
    {
        if (!Auth::check()) {
            return view('admin.auth.login');
        }

        return redirect()->route('admin.index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with(['fail' => 'Your username or password is incorrect.']);
        }
        return redirect()->route('admin.index');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }

    public function getSignUp()
    {
        return view('admin.auth.signup');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:24',
        ]);

        $username = $email = $request->email;
        $password = $request->password;

        $user           = new User();
        $user->email    = $email;
        $user->username = $username;
        $user->password = Hash::make($password);

        $user->save();

        return redirect()->route('admin.auth.login')
            ->with([
                'new_username' => $username,
                'new_password' => $password,
            ]);
    }

    public function getUserProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        }

        return view('admin.users.profile');
    }

    public function postUpdateUser(Request $request)
    {
        if (Auth::check()) {
            $id      = $request->id;
            $name    = $request->name;
            $email   = $request->email;
            $tel     = $request->tel;
            $birth   = $request->birth;
            $address = $request->address;
            $city    = $request->city;

            User::where('id', $id)->update([
                'name'    => $name,
                'email'   => $email,
                'tel'     => $tel,
                'birth'   => $birth,
                'address' => $address,
                'city'    => $city,
            ]);

            return [
                'message' => 'Update Successful.',
                'user'    => $this->getAuthUser(),
            ];
        }
        return [
            'message' => 'Method not allowed.',
        ];
    }

    public function postChangeUserPassword(Request $request)
    {
        $new_password = $request->new_password;

        //----------- Change password -----------
        $user             = Auth::user();
        $current_password = $request->current_password;

        $this->validate($request, [
            'current_password' => 'required',
        ]);
        //If current_password don't match with password in database -> throw error
        if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password)) {
            return reponse([
                'password' => 'Your current password is incorrect.',
            ], 422);
        }

        //If current_password match with password in database -> replace by new_password and save
        $user->password = Hash::make($new_password);
        $user->save();

        //----------- End Change password -----------
        return [
            'message' => 'Update Successful.',
            'user'    => $this->getAuthUser(),
        ];
    }

    public function getUsers()
    {
        if (!Auth::user()->is_admin()) {
            return redirect()->back();
        }

        $users = User::all();
        return view('admin.users.users', [
            'users' => $users,
        ]);
    }

    public function getUserJSON($id = null)
    {
        if ($id) {
            $user = User::find($id);
            return response()->json([
                'name'     => $user->name,
                'username' => $user->username,
            ]);
        }
        $allUsers = User::all();
        $users    = array();
        foreach ($allUsers as $user) {
            array_push($users, [
                'name'     => $user->name,
                'username' => $user->username,
            ]);
        }
        return $users;
    }
    public function getAuthUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return [
                'id'        => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'username'  => $user->username,
                'tel'       => $user->tel,
                'img_url'   => $user->img_url,
                'address'   => $user->address,
                'city'      => $user->city,
                'birth'     => $user->birth,
                'is_admin'  => $user->is_admin,
                'is_author' => $user->is_author(),
            ];
        }
        return [
            'message' => 'Method not allowed.',
        ];
    }
}
