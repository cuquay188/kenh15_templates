<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('category', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getCreateCategory()
    {
        return view('create.create_category');
    }

    public function postCreateCategory(Request $request)
    {
        $name = $request->category;

        $category = new Category();
        $category->name = $name;

        $category->save();

        return redirect()->back();
    }

    public function postDeleteCategory(Request $request)
    {
        $id = $request->category_id;
        Category::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateCategory(Request $request)
    {
        $id = $request->category_id;
        $name = $request->name;
        Category::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }

}
