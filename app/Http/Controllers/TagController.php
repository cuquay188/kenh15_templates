<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class TagController extends Controller
{
    public function getTag()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.tags.list.tags', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }


    public function getCreateTag()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.create.create_tag');
    }

    public function postCreateTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:2,15'
        ]);

        $name = $request->name;
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();
        return redirect()->back();
    }

    public function postUpdateTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:2,15'
        ]);

        $id = $request->tag_id;
        $name = $request->name;
        Tag::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }

    public function postDeleteTag(Request $request)
    {
        $id = $request->tag_id;
        Tag::where('id', $id)->delete();
        return redirect()->back();
    }

    public function getViewTag($id)
    {
        if (!Auth::check())
            return redirect()->back()->with(['fail' => 'Required login.']);
        $tag = Tag::find($id); 
        return view('admin.tags.single.tag', [
            'tag' => $tag 
        ]);
    }
}
