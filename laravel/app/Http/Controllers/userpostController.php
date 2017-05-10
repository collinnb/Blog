<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post/userposts')->with('posts', Post::where('user_id', auth()->id())->get() ) ;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $check = Post::find($id);
        if ($check->user_id == auth::id()){
            return view('post/postedit')->with('posts', Post::find($id));
        } else{

            if (Auth::user()->IsAdmin()){
                return view('post/postedit')->with('posts', Post::find($id));
            }else{
                return redirect('/');
            }

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = Post::find($id);
        $new->title = $request->title;
        $new->slug = $request->slug;
        $new->text = $request->text;
        $new->save();

        return redirect('/manage/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $comments = Comments::where('post_id','=',$id );
        $comments->delete();
        $post->delete();

        return redirect()->back();
    }
}
