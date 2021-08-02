<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;


class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::get();
        return view('blog.blogcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.blogcategories.index');
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
            'title' => 'required|unique:blog_categories,title'    
        ]);

        $category = new BlogCategory;
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->save();

        Session::flash('success', 'Category added successfully');

        return redirect()->route('blog-categories.index');


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
        $category = BlogCategory::findOrFail($id);
        return view('blog.blogcategories.edit', compact('category'));
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
            'title' => 'required'    
        ]);

        $category = BlogCategory::findOrFail($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->save();

        Session::flash('success', 'Category updated successfully');

        return redirect()->route('blog-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Delete Successful');

        return redirect()->route('blog-categories.index');
    }
}
