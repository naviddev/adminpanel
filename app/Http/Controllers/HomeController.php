<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function ShowPosts()
    {
        $posts = \App\model\Post::all();
        return view('posts.shows', compact('posts'));

    }

    public function DeletePosts($id, Request $request)
    {

        $post = \App\model\Post::find($id);
        if (policy($post)->Delete($request->user('admin'), $post)) {
            $post->delete();
            flash('Posts Delete ', 'danger');
        }

        return back();
    }

    public function ShowPostPage($id)
    {
        $post = \App\model\Post::find($id);
        return view('posts.singleShow', compact('post'));

    }

    public function EditPost($id, Request $request)
    {
        $post = \App\model\Post::find($id);
        if (policy($post)->Update($request->user('admin'), $post)) {

            $post->body = $request->body;
            $post->title = $request->title;
            $post->save();
            flash('Posts update ', 'danger');
        }

        return redirect('/admin/posts');
    }

    public function ShowAddPost()
    {

        return view('posts.addPost');
    }

    public function AddPost(Request $request)
    {
        $post = new \App\model\Post;
        $admin=$request->user('admin');

            $post->body=$request->body;
            $post->title=$request->title;
            $admin->posts()->save($post);
            flash('post add');
            return redirect('/admin/posts');



    }

    public function adminsFeatureShow()
    {
        $admins=\App\Admin::all();
        
    }

    public function CommentsAllShow()
    { $comments=\App\Comment::all();
        return view('comments.shows',compact('comments'));

    }

    public function CommentsSeen($id)
    {
        $comment=\App\Comment::find($id);
       if ($comment->seen==0){
           $this->CommentsGetSeen($comment);
       }else $this->CommentsUnSeen($comment);
        
        return back();
    }

    public function CommentsGetSeen($comment)
    {
       
        $comment->seen=1;
        $comment->save();
    }

    public function CommentsUnSeen($comment)
    {
       
        $comment->seen=0;
        $comment->save();
    }

    public function CommentsNewShow()
    {$comments=\App\Comment::where('seen',0)->get();
        return view('comments.shows',compact('comments'));
        
    }

    public function CommentsSeenShow()
    {
        $comments=\App\Comment::where('seen',1)->get();
        return view('comments.shows',compact('comments'));
    }
}
