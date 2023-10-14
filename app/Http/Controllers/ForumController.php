<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Forum::with('postHasUser')->get();
        return view('forum.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title_fr'    => 'required|string|unique:forums,title_fr|min:3',
            'title_en'    => 'required|string|unique:forums,title_en|min:3',
            'body_fr'     => 'required|string|min:10',
            'body_en'     => 'required|string|min:10'
        ];
        
        $request->validate($rules);

        $newPost = Forum::create([
            'title_fr'=> $request->title_fr,
            'title_en'=> $request->title_en,
            'body_fr' => $request->body_fr,
            'body_en' => $request->body_en,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('forum.index'))->withSuccess(trans('lang.text_post_added')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $selectedPost)
    {
        $post = Forum::where('id', $selectedPost->id)->first();
        // $user = $post->postHasUser;

        return view('forum.article', ['post' => $post]);
        // return view('forum.article', ['post' => $post, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $selectedPost)
    {
        return view('forum.edit', ['post' => $selectedPost]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $selectedPost)
    {
        $rules = [
            'title_fr'    => 'required|string|min:3',
            'title_en'    => 'required|string|min:3',
            'body_fr'     => 'required|string|min:10',
            'body_en'     => 'required|string|min:10'
        ];
        
        $request->validate($rules);
        
        $selectedPost->update([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'body_fr'  => $request->body_fr,
            'body_en'  => $request->body_en
        ]);

        return redirect(route('forum.show', $selectedPost->id))->withSuccess(trans('lang.text_post_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $selectedPost)
    {
        $selectedPost->delete();

        return redirect(route('forum.index'))->withSuccess(trans('lang.text_post_deleted')); 
    }
}
