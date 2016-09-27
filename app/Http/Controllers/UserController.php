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
            $this->validate($request, [
                'name'    => isset($request->name) ? 'required|alpha_spaces|between:6,30' : '',
                'tel'     => isset($request->tel) ? 'required|numeric' : '',
                'birth'   => isset($request->birth) ? 'required|date' : '',
                'address' => isset($request->address) ? 'required|alpha_num_spaces' : '',
                'city'    => isset($request->city) ? 'required|alpha_spaces' : '',
            ]);

            $id    = $request->id;
            $query = array();
            if (isset($request->name)) {
                $query['name'] = $request->name;
            }
            if (isset($request->tel)) {
                $query['tel'] = $request->tel;
            }
            if (isset($request->birth)) {
                $query['birth'] = $request->birth;
            }
            if (isset($request->address)) {
                $query['address'] = $request->address;
            }
            if (isset($request->city)) {
                $query['city'] = $request->city;
            }
            User::where('id', $id)->update($query);
            $user = User::find($id);
            return [
                'message' => 'Update Successful.',
                'user'    => $this->getAuthUser($user),
            ];
        }
        return [
            'message' => 'Method not allowed.',
        ];
    }

    public function postChangeUserPassword(Request $request)
    {
        if (Auth::check()) {
            //----------- Change password -----------
            $user             = Auth::user();
            $current_password = $request->current_password;

            //If current_password don't match with password in database -> throw error
            if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password)) {
                return response([
                    'current_password' => ['Your current password is incorrect.'],
                ], 422);
            };
            $this->validate($request, [
                'new_password' => 'required|between:6,24',
            ]);
            $new_password = $request->new_password;

            //If current_password match with password in database -> replace by new_password and save
            $user->password = Hash::make($new_password);
            $user->save();

            //----------- End Change password -----------
            return [
                'message' => 'Update Successful.',
            ];
        }
        return [
            'message' => 'Method not allowed.',
        ];
    }
    public function postChangeUsername(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'username' => 'required|between:5,31|unique:users,username',
            ]);
            $user     = Auth::user();
            $username = $request->username;

            $user->username = $username;
            $user->save();

            return [
                'message' => 'Update Successful.',
                'user'    => $this->getAuthUser($user),
            ];
        }
        return [
            'message' => 'Method not allowed.',
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
        if (Auth::check()) {
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
        return [
            'message' => 'Method not allowed.',
        ];
    }
    public function getAuthUser($user = null)
    {
        if (Auth::check()) {
            $user = $user ? $user : Auth::user();
            return [
                'id'        => $user->id,
                'age'       => $user->age(),
                'name'      => $user->name,
                'email'     => $user->email,
                'username'  => $user->username,
                'tel'       => $user->tel,
                'img_url'   => $user->img_url,
                'address'   => $user->address,
                'city'      => $user->city,
                'birth'     => $user->birth,
                'is_admin'  => $user->is_admin(),
                'is_author' => $user->is_author(),
                'issetPW'   => !!$user->password,
            ];
        }
        return [
            'message' => 'Method not allowed.',
        ];
    }
}
