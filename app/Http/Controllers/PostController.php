<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0 ){
            Session::flash('info', 'You must create a category before attempting to create a post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('category',$categories)
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'contents' => 'required',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_image_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_image_name);

        $post = Post::create([
            'title' => $request-> title,
            'featured' => 'uploads/posts/'.$featured_new_image_name,
            'content' => $request-> contents,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        // many to many
        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        Session::flash('success', 'You have trashed the post');

        return redirect()->back();
    }

    public function trashed(){
        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('trashed', $post);
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently');

        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post successfully restored');

        return redirect()->route('posts');
    }
}
