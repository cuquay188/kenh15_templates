<?php

namespace App\Http\Controllers;

use App\Article;
use App\CategoryAdvance;
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
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.categories.list.categories', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function getCreateCategory()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
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

        $category = Category::where('name', $name)->first();
        $advance = new CategoryAdvance();
        $advance->category_id = $category->id;
        $advance->save();


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
            'name' => 'required|between:3,15'
        ]);

        $id = $request->category_id;
        $name = $request->name;
        Category::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }

    public function getViewCategory($id)
    {
        if (!Auth::check())
            return redirect()->back()->with(['fail' => 'Required login.']);
        $category = Category::find($id);
        $articles = Article::where('category_id', $id)->paginate(5);
        return view('admin.categories.single.category', [
            'category' => $category,
            'articles' => $articles
        ]);
    }

    public function postHotCategory(Request $request)
    {
        $id = $request->category_id;
        $category = Category::find($id);
        $hot = $category->advance->is_hot ? '0' : '1';
        CategoryAdvance::where('category_id', $id)->update(['is_hot' => $hot]);
        if(!$hot)
            CategoryAdvance::where('category_id', $id)->update(['is_header' => $hot]);
        return response()->json([
            'message' => 'success',
            'is_hot' => $hot
        ]);
    }

    public function postHeaderCategory(Request $request)
    {
        $id = $request->category_id;
        $category = Category::find($id);
        $is_header = $category->advance->is_header ? '0' : '1';
        CategoryAdvance::where('category_id', $id)->update(['is_header' => $is_header]);
        return response()->json([
            'message' => 'success',
            'is_header' => $is_header
        ]);
    }
}
