@extends('layouts.app')
@section('title', $article->title . ' — Philbeilts Industrial Group')
@section('meta_description', $article->excerpt ?? 'News and insights from Philbeilts Industrial Group.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('news') }}">News</a>
                <span>/</span>
                <span>{{ $article->category }}</span>
            </div>
            <div style="margin-bottom: 16px;">
                <span style="font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--crimson); background: rgba(185,28,28,0.12); padding: 6px 14px; border-radius: 100px;">{{ $article->category }}</span>
            </div>
            <h1 style="font-size: clamp(1.8rem, 4vw, 3rem);">{{ $article->title }}</h1>
            <p style="margin-top: 16px; font-size: 0.85rem; color: rgba(255,255,255,0.5);">
                {{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }} &nbsp;&middot;&nbsp; {{ $article->read_time }}
            </p>
        </div>
    </div>
</section>

<section class="section section-cream">
    <div class="container" style="max-width: 860px;">
        <div class="fade-in" style="background: var(--white); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: clamp(28px, 4vw, 60px); line-height: 1.9; font-size: 1.05rem; color: var(--text-body);">
            @if($article->excerpt)
            <div style="font-size: 1.15rem; font-weight: 500; color: var(--text-dark); margin-bottom: 28px; border-left: 3px solid var(--crimson); padding-left: 20px;">
                {{ $article->excerpt }}
            </div>
            @endif

            <div class="article-body">
                {!! $article->content !!}
            </div>

            <div style="margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                <a href="{{ route('news') }}" class="btn-outline-dark">&larr; All News & Insights</a>
                <a href="{{ route('contact') }}" class="btn-primary">Partner With Us &rarr;</a>
            </div>
        </div>

        @if(isset($articles) && $articles->count() > 0)
        <div style="margin-top: 60px;">
            <h3 class="display-md" style="font-size: 1.4rem; margin-bottom: 24px;">More from <span class="italic-accent">the Group.</span></h3>
            <div class="news-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
                @foreach($articles as $other)
                <a href="{{ route('news.show', $other->slug) }}" class="news-card fade-in">
                    <div class="news-img" style="height: 160px;">
                        <div class="news-img-placeholder" style="background: linear-gradient(135deg, #1e2235, #0d0f1a); font-size: 2rem; height: 160px;">📰</div>
                    </div>
                    <div class="news-body">
                        <div class="news-meta">
                            <span class="news-cat">{{ $other->category }}</span>
                            <div class="news-sep"></div>
                            <span class="news-date">{{ $other->published_at ? $other->published_at->format('M d, Y') : $other->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="news-title" style="font-size: 0.95rem;">{{ $other->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
