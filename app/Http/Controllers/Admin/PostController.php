<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category' => 'required|string|max:100',
            'read_time' => 'required|string|max:50',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Article created successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'category' => 'required|string|max:100',
            'read_time' => 'required|string|max:50',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_published'] = $request->has('is_published');
        
        if ($validated['is_published'] && !$post->published_at) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Article deleted successfully!');
    }
}
