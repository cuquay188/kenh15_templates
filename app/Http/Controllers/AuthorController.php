<?php

namespace App\Http\Controllers;

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
            return redirect()->route('login')->with(['fail'=>'Required login.']);
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.info.author', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getCreateAuthor()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail'=>'Required login.']);
        return view('admin.create.create_author');
    } 

    public function postCreateAuthor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:6,30',
            'age' => 'required|numeric|min:16|max:80',
            'address' => 'required'
        ]);

        $name = $request->name;
        $age = $request->age;
        $address = $request->address;

        $author = new Author();
        $author->name = $name;
        $author->age = $age;
        $author->address = $address;

        $author->save();

        return redirect()->back();
    }

    public function postDeleteAuthor(Request $request)
    {
        $id = $request->author_id;
        Author::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateAuthor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:6,30',
            'age' => 'required|numeric|min:16|max:80',
            'address' => 'required'
        ]);

        $id = $request->author_id;
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;
        Author::where('id', $id)->update([
            'name' => $name,
            'age' => $age,
            'address' => $address
        ]);
        return redirect()->back();
    }
}
