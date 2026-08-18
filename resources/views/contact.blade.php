@extends('layouts.app')
@section('title', 'Partner With Us — Philbeilts Industrial Group')
@section('meta_description', 'Contact Philbeilts Industrial Group of Companies Ltd for investment, partnership, contracting, or career inquiries. Based in Tema Ashaiman, Ghana.')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Contact</span>
            </div>
            <h1>Partner With Us</h1>
            <p>Whether you're an investor, a contractor, a supplier, or a future team member — we want to hear from you.</p>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-layout">
            <!-- Contact Info -->
            <div class="fade-in">
                <div class="section-label" data-num="01">Get In Touch</div>
                <h2 class="display-md">Start a <span class="italic-accent">conversation.</span></h2>
                <p>We work with investors, governments, contractors and institutions to build the infrastructure Africa needs. Reach out and let's explore how we can work together.</p>

                <div class="contact-details">
                    <div class="contact-detail-item">
                        <div class="detail-label">Headquarters</div>
                        <div class="detail-value">Tema Ashaiman, Greater Accra<br>Ghana, West Africa</div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">
                            <a href="tel:+233303982238">0303 982 238</a><br>
                            <a href="tel:+233303959290">0303 959 290</a>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="detail-label">Mobile</div>
                        <div class="detail-value">
                            <a href="tel:+233208576980">0208 576 980</a><br>
                            <a href="tel:+233549206739">0549 206 739</a>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">
                            <a href="mailto:Philbeiltsindustrialgroup@gmail.com">Philbeiltsindustrialgroup@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="detail-label">Business Hours</div>
                        <div class="detail-value">Monday – Friday: 8:00am – 5:00pm GMT<br>Saturday: 9:00am – 1:00pm GMT</div>
                    </div>
                </div>

                <div style="margin-top: 48px; padding: 28px; background: var(--cream-dark); border: 1px solid var(--border); border-radius: var(--radius);">
                    <div style="font-size: 0.7rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--crimson); margin-bottom: 12px;">Incorporated</div>
                    <div style="font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 600;">PHILBEILTS INDUSTRIAL GROUP<br>OF COMPANIES LTD</div>
                    <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">Registered in Ghana &middot; Est. 2023</div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form fade-in fade-in-delay-1">
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; margin-bottom: 8px;">Send us a message</h3>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 32px;">We'll respond within 2 business days.</p>

                @if(session('success'))
                    <div class="alert-success">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-error">
                        <ul style="padding-left: 16px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" id="contactForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="john@company.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company">Company / Organisation</label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Your company name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+233 ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a topic</option>
                            <option value="Investment Opportunity" {{ old('subject') == 'Investment Opportunity' ? 'selected' : '' }}>Investment Opportunity</option>
                            <option value="Partnership Inquiry" {{ old('subject') == 'Partnership Inquiry' ? 'selected' : '' }}>Partnership Inquiry</option>
                            <option value="Contracting & Procurement" {{ old('subject') == 'Contracting & Procurement' ? 'selected' : '' }}>Contracting & Procurement</option>
                            <option value="Career Application" {{ old('subject') == 'Career Application' ? 'selected' : '' }}>Career Application</option>
                            @if(request()->get('role'))
                            <option value="Job Application: {{ request()->get('role') }}" selected>Job Application: {{ request()->get('role') }}</option>
                            @endif
                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="Media & Press" {{ old('subject') == 'Media & Press' ? 'selected' : '' }}>Media & Press</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Tell us about your inquiry, project, or interest..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary form-submit">Send Message &rarr;</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="trust-section">
    <div class="container">
        <div class="section-label" data-num="02">Quick Links</div>
        <h2 class="display-md fade-in" style="margin-bottom: 40px;">Explore <span class="italic-accent">the Group.</span></h2>
        <div class="partners-grid fade-in fade-in-delay-1">
            <a href="{{ route('about') }}" class="partner-item">About the Group</a>
            <a href="{{ route('industries') }}" class="partner-item">Our Industries</a>
            <a href="{{ route('subsidiaries') }}" class="partner-item">Subsidiaries</a>
            <a href="{{ route('projects') }}" class="partner-item">Flagship Projects</a>
            <a href="{{ route('news') }}" class="partner-item">News & Insights</a>
            <a href="{{ route('careers') }}" class="partner-item">Careers</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Pre-select subject if coming from careers page
const urlParams = new URLSearchParams(window.location.search);
const role = urlParams.get('role');
if (role) {
    const select = document.getElementById('subject');
    const option = document.createElement('option');
    option.value = 'Job Application: ' + role;
    option.textContent = 'Job Application: ' + role;
    option.selected = true;
    select.appendChild(option);
}
</script>
@endpush
