<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;
use App\Author;
use App\Tag;

class TagController extends Controller
{
    public function getTag()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        return view('admin.tags.list.tags');
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

        $id = $request->id;
        $name = $request->name;
        Tag::where('id', $id)->update([
            'name' => $name
        ]);
        return response()->json([
            'message' => 'Update Successful.',
            'tag' => Tag::find($id)
        ]);
    }

    public function postRemoveTag(Request $request)
    {
        $id = $request->id;
        $tag = Tag::find($id);
        Tag::where('id', $id)->delete();
        return response()->json([
            'message' => 'Update Successful.',
            'tag' => $tag
        ]);
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

    public function getTagJSON($id = null)
    {
        if (!$id) {
            $tags = Tag::all();
            foreach ($tags as $tag)
                $tag->articles = count(DB::table('tag_article')->where('tag_id', $tag->id)->get());
            return $tags;
        } else
            return Tag::find($id);
    }

    public function getTagLength()
    {
        return response()->json([
            'message' => 'Get successful.',
            'length' => count(Tag::all())
        ]);
    }
}
