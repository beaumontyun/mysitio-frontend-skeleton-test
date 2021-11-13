<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Home/Index', [
            'blogs' => Blog::all()->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'body' => $blog->body,
                    'created_at' => $blog->created_at,
                    'image' => $blog->image ? URL::route('image', ['path' => $blog->image, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('AddContent/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Blog::create([
            'user_id' => 'nullable',
            'title' => $fields['title'],
            'body' => $fields['body'],
            'image' => $request->file('image') ? $request->file('image')->store('blog') : null,
            'slug' => 'nullable',
        ]);

        return redirect('/posts')->with('success', 'blog created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $post)
    {
        return Inertia::render('Home/Blog', [
            'blog' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'created_at' => $post->created_at,
                    'image' => $post->image ? URL::route('image', ['path' => $post->image, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
            ],
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $post)
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
    public function update(Request $request, Blog $post)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|image',
        ]);

        $post->update($request->only('title', 'body'));

        if ($request->hasFile('image')) {
        $post->update(['image' => $request->file('image')->store('blog')]);
        }

        return back()->with('success', 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $post)
    {
        $post->delete();
    }
}
