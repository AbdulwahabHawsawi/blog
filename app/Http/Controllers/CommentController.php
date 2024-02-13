<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function postComment(Request $request, $post_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:9|max:65535'
        ]);

        $post = Post::find($post_id);

        $comment = new Comment();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;

        //dd($comment->post());

        $comment->post()->associate($post);

        $comment->save();

        return redirect(route('blog.single', $post->slug))->with('success', 'Your comment has been posted successfully!');
    }

    public function edit(Request $request, $comment_id) {
        $comment = Comment::find($comment_id);

        return view('comments.edit')->with('comment', $comment);
    }

    public function update(Request $request, $comment_id) {
        $comment = Comment::find($comment_id);

        $this->validate($request, ['comment' => 'required|min:9|max:65535']);

        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->route('posts.show', $comment->post->id)->with('success', 'The comment has been edited!');
    }

    public function confirmDelete(Request $request, $comment_id) {
        $comment = Comment::find($comment_id);

        return view('comments.delete')->with('comment', $comment);
    }

    public function destroy(Request $request, $comment_id) {
        $comment = Comment::find($comment_id);

        $id = $comment->post->id;

        $comment->delete();

        return redirect()->route('posts.show', $id)->with('success', 'The comment has been deleted!');
    }
}
