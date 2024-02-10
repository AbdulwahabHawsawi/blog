<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Session;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(5);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts/create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
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
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags, false);

        //Session::flash('success', 'The post has been submitted successfully!');

        //redirect
        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'The post has been submitted successfully!');
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', ['post' => $id])->with('post', $post)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $slugChanged = $post->slug != $request->slug;

        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => [
                'required',
                'alpha_dash',
                'min:5',
                'max:255',
                Rule::when($slugChanged, 'unique')
            ],
            'category_id' => 'required|integer',
            'body' => 'required'
        ]);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', ['post' => $id])->with('success', 'the post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'The bost has been deleted!');
    }
}
