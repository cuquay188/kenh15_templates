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


    public function getCreateCategory()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.create.create_category');
    }

    public function getCategoryJSON($id = null)
    {
        if (!$id) {
            $categories = Category::all();
            foreach ($categories as $category) {
                $category->articles = count(Article::where('category_id', $category->id)->get());
                $category->advance;
            }
            return $categories;
        } else {
            $category = Category::find($id);
            $category->articles = count(Article::where('category_id', $category->id)->get());
            $category->advance;
            return $category;
        }
    }

    public function postCreateCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_spaces|between:3,15|unique:categories,name'
        ]);

        $name = $request->name;

        $category = new Category();
        $category->name = $name;
        $category->save();

        $category = Category::where('name', $name)->first();
        $advance = new CategoryAdvance();
        $advance->category_id = $category->id;
        $advance->save();

        return response()->json([
            'message' => 'Update Successful.',
            'category' => $this->getCategoryJSON($category->id)
        ]);
    }

    public function postUpdateCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|between:3,15|unique:categories,name'
        ]);

        $id = $request->id;
        $name = $request->name;
        Category::where('id', $id)->update([
            'name' => $name
        ]);

        return response()->json([
            'message' => 'Update Successful.',
            'category' => $this->getCategoryJSON($id)
        ]);
    }

    public function postHotCategory(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $hot = $category->advance->is_hot ? '0' : '1';
        CategoryAdvance::where('category_id', $id)->update(['is_hot' => $hot]);
        if (!$hot)
            CategoryAdvance::where('category_id', $id)->update(['is_header' => $hot]);

        return response()->json([
            'message' => 'Update Successful.',
            'category' => $this->getCategoryJSON($id)
        ]);
    }

    public function postHeaderCategory(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $is_header = $category->advance->is_header ? '0' : '1';
        CategoryAdvance::where('category_id', $id)->update(['is_header' => $is_header]);

        return response()->json([
            'message' => 'Update Successful.',
            'category' => $this->getCategoryJSON($id)
        ]);
    }

    public function postRemoveCategory(Request $request)
    {
        $id = $request->id;

        $category = $this->getCategoryJSON($id);

        Category::where('id', $id)->delete();
        return response()->json([
            'message' => 'Remove Successful.',
            'category' => $category
        ]);
    }
}
