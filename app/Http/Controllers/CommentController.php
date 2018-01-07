<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use Session;

class CommentController extends Controller
{
    public function showComment(Request $request,$id){
        $comments = new Comment;
       
        $posts = Post::find($id);             
        $comment = $request->comment;
        
        $comments->comment = $comment;
        $comments->post_id = $posts->id; 

        $comments->save();

        Session::flash('success','Comment was added');
        
        return view('blog/view_post', [$posts->slug]);
    }
}
