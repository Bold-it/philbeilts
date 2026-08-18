@extends('layouts.app')
@section('title', 'Flagship Projects — Philbeilts Industrial Group')
@section('meta_description', 'Explore flagship projects of Philbeilts Industrial Group including industrial enclaves, energy substations, highway construction, agricultural hubs, and port development in Ghana.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Projects</span>
            </div>
            <h1>Flagship Projects</h1>
            <p>Strategic investments and developments transforming Ghana's industrial and infrastructure landscape.</p>
        </div>
    </div>
</section>

<section class="section section-dark" style="background: var(--dark);">
    <div class="container">
        <div class="section-label" data-num="01">Active & Planned Projects</div>
        <h2 class="display-md fade-in" style="color: var(--white); margin-bottom: 60px;">Projects that define <span class="italic-accent">a generation.</span></h2>
        <div class="projects-grid fade-in fade-in-delay-1">
            @foreach($projects as $project)
            <div class="project-card">
                <div class="project-id">PROJECT {{ $project['id'] }}</div>
                <h3 class="project-title">{{ $project['title'] }}</h3>
                <div class="project-meta">
                    <span class="project-tag">{{ $project['location'] }}</span>
                    <span class="project-tag">{{ $project['year'] }}</span>
                    @php
                        $statusClass = match($project['status']) {
                            'In Progress' => 'status-progress',
                            'Completed' => 'status-completed',
                            'Planning' => 'status-planning',
                            default => 'status-planning'
                        };
                    @endphp
                    <span class="project-status {{ $statusClass }}">{{ $project['status'] }}</span>
                </div>
                <p class="project-desc">{{ $project['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Explore <span class="italic-accent">investment</span> opportunities.</h2>
            <p>We are actively seeking project partners, investors, and contractors for our current and upcoming developments.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Speak to Our Team &rarr;</a>
                <a href="{{ route('subsidiaries') }}" class="btn-outline">Our Companies</a>
            </div>
        </div>
    </div>
</section>
@endsection
