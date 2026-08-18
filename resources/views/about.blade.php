@extends('layouts.app')
@section('title', 'About Us — Philbeilts Industrial Group')
@section('meta_description', 'Learn about Philbeilts Industrial Group of Companies Ltd — a wholly owned Ghanaian company incorporated in 2023, specializing in industrial and infrastructure development.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>About</span>
            </div>
            <h1>About the Group</h1>
            <p>A wholly owned Ghanaian company built on operational excellence, strategic acquisitions, and a long-term view of sustainable industrial growth.</p>
        </div>
    </div>
</section>

<!-- Introduction -->
<section class="section section-cream">
    <div class="container">
        <div class="about-grid">
            <div>
                <div class="section-label" data-num="01">Introduction</div>
                <h2 class="display-md fade-in">Who we are.</h2>
            </div>
            <div class="about-body fade-in fade-in-delay-1">
                <p>Philbeilts Industrial Group Company Limited is a wholly owned Ghanaian company specializing in industrial and infrastructure development, construction services, and project financing. The company seeks to fund and develop industrial hubs and urban enclaves through strategic investments and acquisitions.</p>
                <p>Incorporated in 2023, the Group operates as part of a diversified consortium of industrial reform companies. The company's primary objective is to support industrial sectors through global logistics, engineering services, and large-scale business development initiatives.</p>
                <p class="accent-text">Philbeilts Industrial Group plays a significant role in contributing to Ghana's economic growth and infrastructure development — focusing on daily operational excellence, strategic navigation of global challenges, and effective utilization of acquisitions to enhance productivity and sustainability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Objectives -->
<section class="section section-cream-dark">
    <div class="container">
        <div class="section-label" data-num="02">Our Objectives</div>
        <h2 class="display-md fade-in" style="max-width: 700px; margin-bottom: 48px;">What we set out <span class="italic-accent">to achieve.</span></h2>
        <div class="industry-services-grid fade-in fade-in-delay-1">
            <div class="service-item">To acquire companies and industries for the development of proposed urban and industrial enclaves.</div>
            <div class="service-item">To provide detailed descriptions and structured proposals for projects across general industrial services.</div>
            <div class="service-item">To demonstrate financial stability, funding capacity, and business capability.</div>
            <div class="service-item">To support industrial growth through strategic partnerships and sustainable investments.</div>
        </div>
    </div>
</section>

<!-- Vision Mission Values -->
<section class="vision-section">
    <div class="container">
        <div class="vision-grid">
            <div class="fade-in">
                <div class="section-label" data-num="03">Vision, Mission & Values</div>
                <h2 class="display-md">The principles that <span class="italic-accent">guide us.</span></h2>
                <p style="margin-top: 24px; color: var(--text-muted); line-height: 1.8; font-size: 0.95rem;">
                    Our values are not aspirations — they are operating standards embedded in every decision, every project, and every partnership we enter.
                </p>
            </div>
            <div class="fade-in fade-in-delay-1">
                <div class="vision-cards">
                    <div class="vision-card">
                        <div class="vision-card-label">Our Vision</div>
                        <p class="vision-card-text">"To become a leading diversified group company recognized globally for excellence, integrity, and sustainable growth."</p>
                    </div>
                    <div class="vision-card">
                        <div class="vision-card-label">Our Mission</div>
                        <p class="vision-card-text">"To create long-term value through strategic investments, innovative solutions, and strong partnerships across multiple industries."</p>
                    </div>
                </div>
                <div class="values-grid" style="margin-top: 24px;">
                    <div class="value-card">
                        <h4>Integrity</h4>
                        <p>Honesty and transparency in all our dealings and business relationships.</p>
                    </div>
                    <div class="value-card">
                        <h4>Excellence</h4>
                        <p>Relentless pursuit of the highest standards in every project we undertake.</p>
                    </div>
                    <div class="value-card">
                        <h4>Innovation</h4>
                        <p>Embracing new ideas, technologies, and methods to remain competitive.</p>
                    </div>
                    <div class="value-card">
                        <h4>Accountability</h4>
                        <p>Taking full ownership and consistently delivering on our commitments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Operational Strategy -->
<section class="stats-section">
    <div class="container">
        <div class="stats-header fade-in">
            <div class="section-label" data-num="04">Operational Strategy</div>
            <h2 class="display-md" style="color: var(--white); max-width: 700px;">How we operate at the <span class="italic-accent">highest level.</span></h2>
        </div>
        <p style="color: rgba(255,255,255,0.65); font-size: 1rem; line-height: 1.8; max-width: 800px; margin-bottom: 60px;" class="fade-in fade-in-delay-1">
            Philbeilts Industrial Group maximizes equipment efficiency by improving machinery performance, extending equipment lifespan, and reducing maintenance costs. The company focuses on capital preservation and operational efficiency across all business sectors. Through structured business outlines and strategic supply agreements, the Group ensures smooth transitions, sustainable growth, and measurable value creation for its stakeholders.
        </p>
        <div class="stats-grid fade-in fade-in-delay-2">
            <div class="stat-card">
                <div class="stat-num">9</div>
                <div class="stat-title">Strategic Industries</div>
                <div class="stat-sub">Diversified portfolio</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">4+</div>
                <div class="stat-title">Continents</div>
                <div class="stat-sub">Africa · Europe · Asia · Americas</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">500+</div>
                <div class="stat-title">Professionals</div>
                <div class="stat-sub">Engineers, operators, executives</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">2023</div>
                <div class="stat-title">Founded</div>
                <div class="stat-sub">Tema Ashaiman, Ghana</div>
            </div>
        </div>
    </div>
</section>

<!-- Industries Overview -->
<section class="section section-cream">
    <div class="container">
        <div class="section-label" data-num="05">Our Industries</div>
        <h2 class="display-md fade-in" style="margin-bottom: 48px;">Nine sectors, one <span class="italic-accent">mission.</span></h2>
        <div class="industries-grid fade-in fade-in-delay-1">
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

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner fade-in">
            <h2>Partner with <span class="italic-accent">Philbeilts.</span></h2>
            <p>We work with investors, governments, contractors and institutions to build the infrastructure Africa needs.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary">Start a Conversation &rarr;</a>
                <a href="{{ route('industries') }}" class="btn-outline">Explore Industries</a>
            </div>
        </div>
    </div>
</section>
@endsection
