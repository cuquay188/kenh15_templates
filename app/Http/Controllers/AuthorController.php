<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class AuthorController extends Controller
{
    public function getAuthor()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.authors.list.authors');
    }

    public function getCreateAuthor()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.create.create_author');
    }

    public function postCreateAuthor(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $user = $request->id;
        $author = new Author();
        $author->user_id = $user;
        $author->save();

        return response()->json([
            'message' => 'Create Successful.',
            'author' => $this->getAuthorJSON($author->id)
        ]);
    }

    public function postRemoveAuthor(Request $request)
    {
        $id = $request->id;
        $author = $this->getAuthorJSON($id);
        Author::where('id', $id)->delete();
        return response()->json([
            'message' => 'Remove Successful.',
            'author' => $author
        ]);
    }

    public function postUpdateAuthor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:6,30',
            'address' => 'required',
            'city' => 'required',
            'birth' => 'date',
            'tel' => 'required',
            'email' => 'required|email'
        ]);

        $id = $request->id;
        $name = $request->name;
        $address = $request->address;
        $birth = $request->birth;
        $tel = $request->tel;
        $city = $request->city;

        $author = Author::find($id);
        User::where('id', $author->user_id)->update([
            'name' => $name,
            'address' => $address,
            'birth' => $birth,
            'tel' => $tel,
            'city' => $city
        ]);
        return response()->json([
            'message' => 'Update Successful.',
            'author' => $this->getAuthorJSON($id)
        ]);
    }

    public function getAuthorJSON($id = null)
    {
        if ($id) {
            $author = Author::find($id);
            $author = [
                'id' => $author->id,
                'name' => $author->user->name,
                'age' => $author->user->age(),
                'birth' => $author->user->birth,
                'address' => $author->user->address,
                'city' => $author->user->city,
                'tel' => $author->user->tel,
                'email' => $author->user->email
            ];
            return $author;
        } else {
            $allAuthors = Author::all();
            $authors = array();
            foreach ($allAuthors as $author) {
                array_push($authors, [
                    'id' => $author->id,
                    'name' => $author->user->name,
                    'age' => $author->user->age(),
                    'birth' => $author->user->birth,
                    'address' => $author->user->address,
                    'city' => $author->user->city,
                    'tel' => $author->user->tel,
                    'email' => $author->user->email
                ]);
            }
            return $authors;
        }
    }

    public function getNormalUser()
    {
        $allUsers = User::all();
        $users = array();
        foreach ($allUsers as $user) {
            if (!$user->author)
                array_push($users, [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username
                ]);
        }
        return $users;
    }

    public function getViewAuthor($id)
    {
        if (!Auth::check())
            return redirect()->back()->with(['fail' => 'Required login.']);
        $author = Author::find($id);
        return view('admin.authors.single.author', [
            'author' => $author
        ]);
    }
}
