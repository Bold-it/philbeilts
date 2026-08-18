@extends('layouts.app')
@section('title', 'Careers — Philbeilts Industrial Group')
@section('meta_description', 'Join Philbeilts Industrial Group — open positions across construction, mining, energy, maritime, agriculture, and finance in Ghana. View all job openings and apply today.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Careers</span>
            </div>
            <h1>Join the Group</h1>
            <p>We build companies that outlast trends. Join a team of engineers, operators, and executives shaping Ghana's industrial future.</p>
        </div>
    </div>
</section>

<section class="section section-cream">
    <div class="container">
        <div class="careers-layout">
            <div class="careers-intro fade-in">
                <div class="section-label" data-num="01">Open Roles</div>
                <h2>People who build.<br><span class="italic-accent">Together.</span></h2>
                <p>At Philbeilts Industrial Group, we believe the best infrastructure is built by the best people. We're looking for talent across all our divisions — from site to boardroom.</p>
                <div class="open-roles-badge">
                    <span class="roles-num">{{ count($jobs) }}+ positions</span>
                    <span class="roles-label">Across 7 subsidiaries in Ghana</span>
                </div>
            </div>
            <div class="jobs-list fade-in fade-in-delay-1">
                @foreach($jobs as $job)
                <a href="{{ route('contact') }}?role={{ urlencode($job['title']) }}" class="job-item">
                    <div class="job-info">
                        <h4>{{ $job['title'] }}</h4>
                        <div class="job-tags">
                            <span class="job-tag">{{ $job['department'] }}</span>
                            <span class="job-separator">&middot;</span>
                            <span class="job-location">{{ $job['location'] }}</span>
                        </div>
                    </div>
                    <span class="job-apply">Apply &rarr;</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="stats-section">
    <div class="container">
        <div class="stats-header fade-in">
            <div class="section-label" data-num="02">Why Philbeilts</div>
            <h2 class="display-md" style="color: var(--white);">What we offer our <span class="italic-accent">team.</span></h2>
        </div>
        <div class="stats-grid fade-in fade-in-delay-1">
            <div class="stat-card">
                <div class="stat-num" style="font-size: 2rem;">🌍</div>
                <div class="stat-title">Regional Impact</div>
                <div class="stat-sub">Work on projects that change lives across Ghana and West Africa</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" style="font-size: 2rem;">📈</div>
                <div class="stat-title">Growth Culture</div>
                <div class="stat-sub">Mentorship, training and advancement across 9 industries</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" style="font-size: 2rem;">🤝</div>
                <div class="stat-title">Strong Teams</div>
                <div class="stat-sub">500+ professionals across engineering, operations, and management</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" style="font-size: 2rem;">🏆</div>
                <div class="stat-title">Excellence First</div>
                <div class="stat-sub">We hold ISO certifications and operate to global standards</div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Don't see your <span class="italic-accent">role?</span></h2>
            <p>We're always interested in exceptional people. Send us your profile and we'll be in touch when the right opportunity arises.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Send Your CV &rarr;</a>
                <a href="mailto:Philbeiltsindustrialgroup@gmail.com" class="btn-outline">Philbeiltsindustrialgroup@gmail.com</a>
            </div>
        </div>
    </div>
</section>
@endsection
