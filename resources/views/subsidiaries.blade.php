@extends('layouts.app')
@section('title', 'Our Subsidiaries — Philbeilts Industrial Group')
@section('meta_description', 'Explore the operating subsidiaries of Philbeilts Industrial Group spanning mining, construction, energy, maritime logistics, agriculture, banking, and pharmaceuticals.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Subsidiaries</span>
            </div>
            <h1>Our Companies</h1>
            <p>A selection of our leading operating companies — each a focused business within the Philbeilts Group ecosystem.</p>
        </div>
    </div>
</section>

<section class="section section-cream">
    <div class="container">
        <div class="section-label" data-num="01">Operating Companies</div>
        <h2 class="display-md fade-in" style="margin-bottom: 60px;">Seven companies. <span class="italic-accent">One group.</span></h2>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;" class="fade-in fade-in-delay-1">
            @foreach($subsidiaries as $sub)
            <a href="{{ route('industries.show', $sub['slug']) }}" class="subsidiary-card" style="font-size: 1rem;">
                <div class="sub-img-wrap" style="height: 220px;">
                    <div class="sub-img-placeholder" style="background: linear-gradient(135deg, #0d0f1a, #1e2235); font-size: 3.5rem;">
                        🏭
                    </div>
                </div>
                <div class="sub-body" style="padding: 28px;">
                    <div class="sub-sector">{{ $sub['id'] }} &middot; {{ $sub['sector'] }}</div>
                    <h3 class="sub-name" style="font-size: 1.2rem; margin-bottom: 12px;">{{ $sub['name'] }}</h3>
                    <p class="sub-desc" style="font-size: 0.88rem; line-height: 1.7; margin-bottom: 20px;">{{ $sub['desc'] }}</p>
                    <span class="industry-explore">Explore division</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="trust-section">
    <div class="container">
        <div class="section-label" data-num="02">Standards & Compliance</div>
        <h2 class="display-md fade-in">Each company, held to the same <span class="italic-accent">high standards.</span></h2>
        <div class="trust-certs fade-in fade-in-delay-1">
            @foreach(['ISO 9001', 'ISO 14001', 'ISO 45001', 'AGI Member', 'GIPC Registered', 'PURC Compliant'] as $cert)
            <div class="cert-badge">
                <div class="cert-check">✓</div>
                {{ $cert }}
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Interested in one of our <span class="italic-accent">companies?</span></h2>
            <p>Reach out to discuss investment, contracting, or collaboration opportunities across any of our subsidiary businesses.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Contact Us &rarr;</a>
                <a href="{{ route('industries') }}" class="btn-outline">View All Industries</a>
            </div>
        </div>
    </div>
</section>
@endsection
