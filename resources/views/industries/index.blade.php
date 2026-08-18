@extends('layouts.app')
@section('title', 'Our Industries — Philbeilts Industrial Group')
@section('meta_description', 'Explore all 9 strategic industries of Philbeilts Industrial Group: Real Estate, Banking, Oil & Gas, Mining, Pharmaceuticals, Logistics, Agriculture, Marine, and Commercial Infrastructure.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Industries</span>
            </div>
            <h1>Our Industries</h1>
            <p>Nine strategic sectors operating under one diversified group — each with its own leadership, standards, and mandate for excellence.</p>
        </div>
    </div>
</section>

<section class="section section-cream-dark">
    <div class="container">
        <div class="industries-grid fade-in">
            @foreach($industries as $industry)
            <a href="{{ route('industries.show', $industry['slug']) }}" class="industry-card">
                <div class="industry-img-wrap">
                    <div class="industry-img-placeholder" style="background: linear-gradient(135deg, {{ $industry['color'] }}33, {{ $industry['color'] }}88);">
                        {{ $industry['icon'] }}
                        <div class="industry-img-overlay">
                            <span class="industry-roman">{{ $industry['roman'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="industry-card-body">
                    <h3 class="industry-card-title">{{ $industry['title'] }}</h3>
                    <p class="industry-card-desc">{{ $industry['short'] }}</p>
                    <span class="industry-explore">Explore</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Invest in a sector that <span class="italic-accent">matters.</span></h2>
            <p>Explore partnership and investment opportunities across our nine strategic industries.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Partner With Us &rarr;</a>
                <a href="{{ route('projects') }}" class="btn-outline">View Projects</a>
            </div>
        </div>
    </div>
</section>
@endsection
