<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(2);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        //store data
        /* // for Mass Assignment
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        */
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        Session::flash('success', 'The post has been submitted successfully!');
        
        //redirect
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $id])->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'the post has been updated successfully!');

        return redirect()->route('posts.show', ['post' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The bost has been deleted!');

        return redirect()->route('posts.index');
    }
}
