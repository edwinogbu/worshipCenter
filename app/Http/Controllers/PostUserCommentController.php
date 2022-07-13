<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PostUserComment;
use Brian2694\Toastr\Facades\Toastr;

class PostUserCommentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post, User $user)
    {

        // dd($request->all());
        // $this->validate($request, [
        //     'body'=>'required'
        // ]);

        //   $posted = $request->user()->posts()->comments()->create($request->only('body','user_id','post_id'));

        // if ($posted == true) {
        //     Toastr::success('<b><span style="font-size:30px;">New Post Created successfully :</span></b>)','success');

        // }
        // return back();


        //  dd($post->likedBy($request->user()));
        //  if ($post->likedBy($request->user())) {
        //     return response(null, 409);
        // }

        // $post->comments()->create([
        //     'user_id'=>$request->post->user->id,
        //     'post_id'=>$request->post->id,
        //     'body'=>$request->body,
        // ]);
        $posted = $request->user()->posts()->comments()->create($request->only('user_id','post_id','body'));

        // Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostUserComment  $postUserComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostUserComment $postUserComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostUserComment  $postUserComment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostUserComment $postUserComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostUserComment  $postUserComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostUserComment $postUserComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostUserComment  $postUserComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $request->user()->comments()->where('post_id', $post->id)->delete();

        return back();
    }
}
