<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{

    public function publicHome(Request $request){
        $posts = Post::paginate(10);
        $organization = '';
        if($request->input('type') == 'recentPosts'){
            $posts = Post::orderBy('created_at','desc')->paginate(10);
            $organization = 'Top 10 Most Recent Posts';
        }else if($request->input('type') == 'mostVisited'){
            $posts = Post::orderBy('visit_count','desc')->paginate(10);
            $organization = 'Top 10 Most Visited Posts';
            }else{
                $posts = Post::orderBy('created_at','desc')->paginate(10);
                $organization = 'Top 10 Most Recent Posts';
            } 
        
        $data = array(
            'posts' => $posts,
            'organization' =>$organization
        );
        

        return view('blog/home',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LoggedInUserId = Auth::id();
        $posts = Post::all()->where('user_id', $LoggedInUserId);
        return view('adminPanel/home',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'body' => 'required',
        ]);
        
        $post = new Post;

        $postTitle = $request->title;
        $postBody = $request->body;
        $postUserId = Auth::id();

        $post->user_id = $postUserId;
        $post->title = $postTitle;
        $post->body = $postBody;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = array(
            'id' => $id,
            'post' => $post
        );
        return view('blog/view_post',$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        $visitCount = $request->visitCount;
        $post->visit_count = $visitCount;

        $post->save();       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
