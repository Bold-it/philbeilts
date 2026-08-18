@extends('layouts.app')

@section('title', 'Philbeilts Industrial Group — Building the Industrial Backbone of Africa')
@section('meta_description', 'Philbeilts Industrial Group of Companies Ltd — A diversified consortium of nine industries engineered to power Ghana\'s next century of growth. Est. 2023, Tema Ashaiman, Ghana.')

@section('content')

<!-- ================================================
     HERO
     ================================================ -->
<section class="hero" id="home">
    <div class="hero-bg"></div>
    <div class="hero-content container">
        <div class="hero-eyebrow fade-in">
            <span class="hero-eyebrow-dot"></span>
            EST. &nbsp;2023 &nbsp;&middot;&nbsp; GHANA &nbsp;&middot;&nbsp; AFRICA &nbsp;&middot;&nbsp; WORLDWIDE
        </div>
        <h1 class="hero-title fade-in fade-in-delay-1">
            Building the <span class="accent">Industrial</span><br>Backbone of Africa.
        </h1>
        <p class="hero-subtitle fade-in fade-in-delay-2">
            A diversified consortium of nine industries — engineering, energy, mining, banking, logistics and more — engineered to power Ghana's next century of growth.
        </p>
        <div class="hero-actions fade-in fade-in-delay-3">
            <a href="{{ route('about') }}" class="btn-primary">Discover Our Story &rarr;</a>
            <a href="{{ route('subsidiaries') }}" class="btn-outline">Our Companies</a>
        </div>
        <div class="hero-stats fade-in fade-in-delay-3">
            <div class="hero-stat">
                <span class="num">9</span>
                <span class="label">Strategic Industries</span>
            </div>
            <div class="hero-stat">
                <span class="num">4+</span>
                <span class="label">Continents Reached</span>
            </div>
            <div class="hero-stat">
                <span class="num">500+</span>
                <span class="label">Professionals</span>
            </div>
            <div class="hero-stat">
                <span class="num">2023</span>
                <span class="label">Year Founded</span>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ================================================
     TICKER
     ================================================ -->
<div class="ticker">
    <div class="ticker-track">
        @php
            $items = ['Across 4+ Continents', '9 Strategic Industries', '500+ Professionals', 'Founded in Ghana, 2023', 'ISO 9001 Certified', 'GIPC Registered', 'Real Estate & Infrastructure', 'Oil, Gas & Energy', 'Mining & Industrial Operations', 'Logistics & Shipping', 'Agriculture & Agro-Processing', 'Marine & Heavy Equipment'];
        @endphp
        @foreach(array_merge($items, $items) as $item)
            <div class="ticker-item">
                <span class="ticker-dot"></span>
                {{ $item }}
            </div>
        @endforeach
    </div>
</div>

<!-- ================================================
     ABOUT
     ================================================ -->
<section class="about-section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-left">
                <div class="section-label" data-num="01">About the Group</div>
                <h2 class="display-lg fade-in">A diversified consortium engineered for <span class="italic-accent">enduring growth.</span></h2>
            </div>
            <div class="about-body fade-in fade-in-delay-1">
                <p>Philbeilts Industrial Group plays a defining role in Ghana's economic growth and infrastructure development. Incorporated in 2023, we operate as part of a diversified consortium of industrial reform companies — built on operational excellence, strategic acquisitions, and a long view of productivity and sustainability across nine critical industries.</p>
                <p class="accent-text">From the Gulf of Guinea to the highlands of Ashanti, we develop the roads, the energy, the housing, the agriculture and the capital that modern economies are made of. We invest, we build, and we hold — for generations.</p>
                <p>The Group develops and manages diversified project portfolios across multiple sectors, offering comprehensive industrial and business solutions through its subsidiaries and strategic partners — serving both the public and private sectors of the Ghanaian economy and beyond.</p>
                <div style="margin-top: 32px;">
                    <a href="{{ route('about') }}" class="link-arrow">Learn more about us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     BY THE NUMBERS
     ================================================ -->
<section class="stats-section" id="numbers">
    <div class="container">
        <div class="stats-header fade-in">
            <div class="section-label" data-num="02">By the Numbers</div>
            <h2 class="display-lg" style="color: var(--white); max-width: 700px;">
                The scale of a national operator.<br>The discipline of a private holding.
            </h2>
        </div>
        <div class="stats-grid">
            <div class="stat-card fade-in">
                <div class="stat-num">9</div>
                <div class="stat-title">Strategic industries</div>
                <div class="stat-sub">From energy to agriculture</div>
            </div>
            <div class="stat-card fade-in fade-in-delay-1">
                <div class="stat-num">4+</div>
                <div class="stat-title">Continents reached</div>
                <div class="stat-sub">Africa &middot; Europe &middot; Asia &middot; Americas</div>
            </div>
            <div class="stat-card fade-in fade-in-delay-2">
                <div class="stat-num">500+</div>
                <div class="stat-title">Professionals</div>
                <div class="stat-sub">Engineers, operators, executives</div>
            </div>
            <div class="stat-card fade-in fade-in-delay-3">
                <div class="stat-num">2023</div>
                <div class="stat-title">Year founded</div>
                <div class="stat-sub">Built for the next century</div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     INDUSTRIES
     ================================================ -->
<section class="industries-section" id="industries">
    <div class="container">
        <div class="industries-header">
            <div>
                <div class="section-label" data-num="03">Our Industries</div>
                <h2 class="display-lg fade-in">The breadth <span class="italic-accent">of the group.</span></h2>
            </div>
            <div class="industries-desc fade-in fade-in-delay-1">
                Each division operates with its own leadership and management standards for safety, governance, and execution.
            </div>
        </div>
        <div class="industries-grid">
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

<!-- ================================================
     SUBSIDIARIES
     ================================================ -->
<section class="subsidiaries-section" id="subsidiaries">
    <div class="container">
        <div class="subsidiaries-header">
            <div>
                <div class="section-label" data-num="04">Featured Subsidiaries</div>
                <h2 class="display-lg fade-in">A selection of our leading <span class="italic-accent">operating companies.</span></h2>
            </div>
            <a href="{{ route('subsidiaries') }}" class="link-arrow fade-in fade-in-delay-1">View all companies</a>
        </div>
        <div class="subsidiaries-grid">
            @foreach($subsidiaries as $sub)
            <a href="{{ route('industries.show', $sub['slug']) }}" class="subsidiary-card">
                <div class="sub-img-wrap">
                    <div class="sub-img-placeholder" style="background: linear-gradient(135deg, #1a1a2e, #2d2d4e);">
                        🏭
                    </div>
                </div>
                <div class="sub-body">
                    <div class="sub-sector">{{ $sub['id'] }} &middot; {{ $sub['sector'] }}</div>
                    <h3 class="sub-name">{{ $sub['name'] }}</h3>
                    <p class="sub-desc">{{ $sub['desc'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ================================================
     VISION / LEADERSHIP
     ================================================ -->
<section class="vision-section" id="leadership">
    <div class="container">
        <div class="vision-grid">
            <div>
                <div class="section-label" data-num="05">From Leadership</div>
                <h2 class="display-lg fade-in">Anchored in <span class="italic-accent">purpose,</span><br>guided by values.</h2>
                <p style="margin-top: 24px; color: var(--text-muted); font-size: 0.95rem; line-height: 1.8;">
                    Philbeilts Industrial Group was founded to build lasting industrial capacity in Ghana and across Africa — through disciplined investment, strategic partnerships, and a commitment to excellence in everything we do.
                </p>
                <div style="margin-top: 32px;">
                    <a href="{{ route('about') }}" class="link-arrow">Learn more about us</a>
                </div>
            </div>
            <div class="vision-cards fade-in fade-in-delay-1">
                <div class="vision-card">
                    <div class="vision-card-label">Our Vision</div>
                    <p class="vision-card-text">"To become a leading diversified group company recognized globally for excellence, integrity, and sustainable growth."</p>
                </div>
                <div class="vision-card">
                    <div class="vision-card-label">Our Mission</div>
                    <p class="vision-card-text">"To create long-term value through strategic investments, innovative solutions, and strong partnerships across multiple industries."</p>
                </div>
                <div class="values-grid" style="margin-top: 0;">
                    <div class="value-card">
                        <h4>Integrity</h4>
                        <p>Honesty and transparency in all dealings and decisions.</p>
                    </div>
                    <div class="value-card">
                        <h4>Excellence</h4>
                        <p>Relentless pursuit of quality in every project we undertake.</p>
                    </div>
                    <div class="value-card">
                        <h4>Innovation</h4>
                        <p>Embracing new ideas and methods to stay ahead.</p>
                    </div>
                    <div class="value-card">
                        <h4>Accountability</h4>
                        <p>Taking ownership and delivering on our commitments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     GLOBAL FOOTPRINT
     ================================================ -->
<section class="footprint-section" id="global">
    <div class="container">
        <div class="footprint-grid">
            <div class="fade-in">
                <div class="section-label" data-num="06" style="color: var(--crimson);">Global Footprint</div>
                <h2 class="display-lg" style="color: var(--white);">Anchored in Ghana, operating <span class="italic-accent">worldwide.</span></h2>
                <p style="margin-top: 24px; color: rgba(255,255,255,0.65); font-size: 0.95rem; line-height: 1.8;">
                    Philbeilts Industrial Group maintains strong operational capacity within Ghana and internationally through structured supply agreements and defined business frameworks spanning multiple continents.
                </p>
            </div>
            <div class="fade-in fade-in-delay-1">
                <div class="footprint-regions">
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🇬🇭 Ghana</div>
                        <div class="region-detail">Headquarters — Tema Ashaiman</div>
                    </div>
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🌍 Africa</div>
                        <div class="region-detail">West & Central Africa operations</div>
                    </div>
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🌍 Europe</div>
                        <div class="region-detail">Strategic partnerships & trade</div>
                    </div>
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🌏 Asia</div>
                        <div class="region-detail">Supply chain & equipment</div>
                    </div>
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🌎 Americas</div>
                        <div class="region-detail">North & South America corridors</div>
                    </div>
                    <div class="region-item">
                        <div class="region-name" style="color: var(--white);">🌊 Maritime</div>
                        <div class="region-detail">Gulf of Guinea shipping routes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     TRUST & COMPLIANCE
     ================================================ -->
<section class="trust-section" id="compliance">
    <div class="container">
        <div class="section-label" data-num="07">Trust & Compliance</div>
        <h2 class="display-md fade-in">Operating to the standards expected<br>of a <span class="italic-accent">global industrial holding.</span></h2>
        <div class="trust-certs fade-in fade-in-delay-1">
            @foreach(['ISO 9001', 'ISO 14001', 'ISO 45001', 'AGI Member', 'GIPC Registered', 'PURC Compliant'] as $cert)
            <div class="cert-badge">
                <div class="cert-check">✓</div>
                {{ $cert }}
            </div>
            @endforeach
        </div>
        <div class="partners-label">Member &middot; Partner</div>
        <div class="partners-grid fade-in fade-in-delay-2">
            @foreach(['Ghana Chamber of Mines', 'Association of Ghana Industries', 'Ghana Investment Promotion Centre', 'West African Energy Council', 'Ghana Ports & Harbours', 'ECOWAS Trade Network'] as $partner)
            <div class="partner-item">{{ $partner }}</div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================================================
     NEWS
     ================================================ -->
<section class="news-section" id="news">
    <div class="container">
        <div class="news-header">
            <div>
                <div class="section-label" data-num="08">Latest News</div>
                <h2 class="display-md fade-in">The latest from<br><span class="italic-accent">across the group.</span></h2>
            </div>
            <a href="{{ route('news') }}" class="link-arrow fade-in fade-in-delay-1">View all news</a>
        </div>
        <div class="news-grid">
            @forelse($news as $article)
            <a href="{{ route('news.show', $article->slug) }}" class="news-card fade-in">
                <div class="news-img">
                    <div class="news-img-placeholder" style="background: linear-gradient(135deg, #1e2235, #0d0f1a);">
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
                    <span class="news-read">{{ $article->read_time }}</span>
                </div>
            </a>
            @empty
            <p style="color: var(--text-muted);">No news published yet.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- ================================================
     CAREERS
     ================================================ -->
<section class="careers-section" id="careers">
    <div class="container">
        <div class="careers-layout">
            <div class="careers-intro fade-in">
                <div class="section-label" data-num="09">Careers</div>
                <h2>We build companies.<br>You help us <span class="italic-accent">outlast them.</span></h2>
                <p>If you're ready for the work, we're ready to back you. Join a growing team of engineers, operators, and executives building Ghana's industrial future.</p>
                <a href="{{ route('careers') }}" class="btn-outline-dark" style="display: inline-flex; margin-bottom: 32px;">See all openings &rarr;</a>
                <div class="open-roles-badge">
                    <span class="roles-num">{{ count($jobs) }}+ positions</span>
                    <span class="roles-label">Across 7 subsidiaries</span>
                </div>
            </div>
            <div class="jobs-list fade-in fade-in-delay-1">
                @forelse($jobs as $job)
                <a href="{{ route('contact') }}?role={{ urlencode($job->title) }}" class="job-item">
                    <div class="job-info">
                        <h4>{{ $job->title }}</h4>
                        <div class="job-tags">
                            <span class="job-tag">{{ $job->department }}</span>
                            <span class="job-separator">&middot;</span>
                            <span class="job-location">{{ $job->location }}</span>
                        </div>
                    </div>
                    <span class="job-apply">Apply &rarr;</span>
                </a>
                @empty
                <p style="color: var(--text-muted);">No positions open currently.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     CTA
     ================================================ -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Ready to build something <span class="italic-accent">that lasts?</span></h2>
            <p>Whether you're an investor, a partner, a supplier, or a future team member — there's a place for you at Philbeilts Industrial Group.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Start a Conversation &rarr;</a>
                <a href="mailto:Philbeiltsindustrialgroup@gmail.com" class="btn-outline">Philbeiltsindustrialgroup@gmail.com</a>
            </div>
        </div>
    </div>
</section>

@endsection
