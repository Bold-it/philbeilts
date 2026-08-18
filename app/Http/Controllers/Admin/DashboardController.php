<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ContactMessage;
use App\Models\JobListing;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('is_published', true)->count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'total_messages' => ContactMessage::count(),
            'active_jobs' => JobListing::where('is_active', true)->count(),
            'total_jobs' => JobListing::count(),
        ];

        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentPosts'));
    }
}
