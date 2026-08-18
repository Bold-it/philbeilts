@extends('layouts.app')
@section('title', $industry['title'] . ' — Philbeilts Industrial Group')
@section('meta_description', $industry['short'] . ' Philbeilts Industrial Group operates across ' . $industry['title'] . ' in Ghana and Africa.')
@section('content')

<section class="page-header" style="background: linear-gradient(135deg, {{ $industry['color'] }}55, var(--dark));">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('industries') }}">Industries</a>
                <span>/</span>
                <span>{{ $industry['title'] }}</span>
            </div>
            <div style="font-family: 'Playfair Display', serif; font-size: 4rem; margin-bottom: 16px; opacity: 0.8;">{{ $industry['icon'] }}</div>
            <h1>{{ $industry['title'] }}</h1>
            <p>{{ $industry['short'] }}</p>
        </div>
    </div>
</section>

<section class="industry-detail-body">
    <div class="container">
        <div class="about-grid" style="align-items: start;">
            <div class="fade-in">
                <div class="section-label" data-num="{{ $industry['roman'] }}">Division Overview</div>
                <h2 class="display-md">Core services <span class="italic-accent">& capabilities.</span></h2>
                <p style="margin-top: 24px; color: var(--text-muted); line-height: 1.8; font-size: 0.95rem;">
                    The {{ $industry['title'] }} division of Philbeilts Industrial Group operates with dedicated leadership and upholds the highest standards of performance, safety, and governance in all its operations across Ghana and internationally.
                </p>
                <div style="margin-top: 40px;">
                    <a href="{{ route('contact') }}" class="btn-primary">Inquire About This Division &rarr;</a>
                </div>
            </div>
            <div class="fade-in fade-in-delay-1">
                <div class="industry-services-grid" style="margin-top: 0;">
                    @foreach($industry['services'] as $service)
                    <div class="service-item">{{ $service }}</div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Other Industries -->
        <div class="fade-in fade-in-delay-2">
            <h3 class="display-md" style="margin-top: 80px; margin-bottom: 12px; font-size: 1.4rem;">Explore other <span class="italic-accent">industries.</span></h3>
            <div class="industry-nav-grid">
                @foreach($industries as $other)
                    @if($other['slug'] !== $industry['slug'])
                    <a href="{{ route('industries.show', $other['slug']) }}" class="industry-nav-item">
                        <span style="font-size: 1.4rem;">{{ $other['icon'] }}</span>
                        <div>
                            <span class="roman" style="display: block;">{{ $other['roman'] }}</span>
                            {{ $other['title'] }}
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Work with our <span class="italic-accent">{{ $industry['title'] }}</span> division.</h2>
            <p>Contact us to explore investment, contracting, or partnership opportunities in this sector.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Get In Touch &rarr;</a>
                <a href="{{ route('industries') }}" class="btn-outline">All Industries</a>
            </div>
        </div>
    </div>
</section>
@endsection
