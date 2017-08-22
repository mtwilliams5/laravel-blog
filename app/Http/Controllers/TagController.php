<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tag;
use App\Post;
use Auth;
use Gate;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getAdminIndex()
    {
        $tags = Tag::orderBy('name', 'asc')->paginate(10);
        return view('admin.tags.index', ['tags' => $tags]);
    }
    
    public function getAdminCreate()
    {
        return view('admin.tags.create');
    }
    
    public function getAdminEdit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', ['tag' => $tag, 'tagId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
        $tag = new Tag([
            'name' => $request->input('name')
        ]);
        $tag->save();
        return redirect()->route('admin.tags.index')->with('info', 'Tag created: ' . $request->input('name'));
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
        $tag = Tag::find($request->input('id'));
        if (Gate::denies('manipulate-tags')) {
            return redirect()->back();
        }
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('admin.tags.index')->with('info', 'Tag edited, new Name is: ' . $request->input('name'));
    }
    
    public function getAdminDelete($id)
    {
        $tag = Tag::find($id);
        if (Gate::denies('manipulate-tags')) {
            return redirect()->back();
        }
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'Tag deleted!');
    }
}