<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class AuthorController extends Controller
{
    public function getAuthor()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('author', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getCreateAuthor()
    {
        return view('create.create_author');
    }

    public function getCreateAuthors()
    {
        return view('create.create_authors');
    }

    public function postCreateAuthor(Request $request)
    {
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
