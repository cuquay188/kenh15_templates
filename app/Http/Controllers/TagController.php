<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Author;
use App\Tag;

class TagController extends Controller
{
    public function getTag()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('tag', [
            'tags' => $tags,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }


    public function getCreateTag()
    {
        return view('create.create_tag');
    }

    public function postCreateTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|between:3,15'
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
            'name' => 'required|between:3,15'
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
}
