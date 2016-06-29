<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class CategoryController extends Controller
{
    public function getCategory()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail'=>'Required login.']);
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.info.category', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getCreateCategory()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail'=>'Required login.']);
        return view('admin.create.create_category');
    }

    public function postCreateCategory(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|between:3,15'
        ]);

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
        $this->validate($request, [
            'category' => 'required|between:3,15'
        ]);
        
        $id = $request->category_id;
        $name = $request->name;
        Category::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }

}
