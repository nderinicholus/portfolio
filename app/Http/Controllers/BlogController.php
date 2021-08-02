<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::get();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::get();
        return view('blog.create', compact('categories'));
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
            'title' => 'required|unique:blogs,title',
            'blogcategory_id'     => 'required|integer',
            'content' => 'required',

        ]);

        $post = new Blog;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->content = $request->content;
        $post->blogcategory_id = $request->blogcategory_id;
        $post->save();

        Session::flash('success', 'Post created successfully');

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::findOrFail($id);
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        $cats = [];
        foreach($categories as $category) {
            $cats[$category->id] = $category->name; 
        }
        return view('blog.edit', compact('post', 'categories'));
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
        $this->validate($request, [
            'title' => 'required',
            'blogcategory_id'     => 'required|integer',
            'content' => 'required',

        ]);

        $post = Blog::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->content = $request->content;
        $post->blogcategory_id = $request->blogcategory_id;
        $post->save();

        Session::flash('success', 'Post updated successfully');

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        $post->delete();

        Session::flash('success', 'Post deleted successfully');
        return redirect()->route('blog.index');
    }
}
