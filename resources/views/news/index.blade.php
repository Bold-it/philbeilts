@extends('layouts.app')
@section('title', 'News & Insights — Philbeilts Industrial Group')
@section('meta_description', 'Latest news, partnerships, operational updates and infrastructure announcements from Philbeilts Industrial Group of Companies Ltd.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>News</span>
            </div>
            <h1>News & Insights</h1>
            <p>The latest developments, partnerships, and milestones from across the Philbeilts Group.</p>
        </div>
    </div>
</section>

<section class="section section-cream">
    <div class="container">
        <div class="news-grid fade-in">
            @forelse($articles as $article)
            <a href="{{ route('news.show', $article->slug) }}" class="news-card">
                <div class="news-img">
                    <div class="news-img-placeholder" style="background: linear-gradient(135deg, #1e2235, #0d0f1a); font-size: 3rem;">
                        📰
                    </div>
                </div>
                <div class="news-body">
                    <div class="news-meta">
                        <span class="news-cat">{{ $article->category }}</span>
                        <div class="news-sep"></div>
                        <span class="news-date">{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}</span>
                    </div>
                    <h3 class="news-title">{{ $article->title }}</h3>
                    <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6; margin-top: 10px;">{{ $article->excerpt }}</p>
                    <span class="news-read">{{ $article->read_time }}</span>
                </div>
            </a>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0; color: var(--text-muted);">
                <h3>No articles published yet</h3>
                <p>Check back soon for new updates from across the Group.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
