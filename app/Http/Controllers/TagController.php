<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        return redirect()->route('tags.index')->with('success', 'The tag "'.$request->name.'" has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $tag = Tag::find($id);

        $oldName = $tag->name;

        $tag->name = $request->name;

        $tag->save();

        return redirect()->route('tags.show', $tag->id)->with('success', 'The tag "'.$oldName.'" has been renamed to "'.$request->name.'".');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);

        $tagName = $tag->name;

        $tag->posts()->detach();

        $tag->delete();

        return redirect()->route('tags.index', $tag->id)->with('success', 'The tag "'.$tagName.'" has been deleted!');
    }
}
