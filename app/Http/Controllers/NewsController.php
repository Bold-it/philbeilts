<?php

namespace App\Http\Controllers;

use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('news.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $articles = Post::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('news.show', compact('article', 'articles'));
    }
}
