<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Philbeilts Industrial Group of Companies Ltd — A diversified consortium of nine industries engineered to power Ghana\'s next century of growth.')">
    <meta name="keywords" content="Philbeilts, Ghana industry, infrastructure, mining, oil gas, logistics, agriculture, construction, banking">
    <meta property="og:title" content="@yield('title', 'Philbeilts Industrial Group')">
    <meta property="og:description" content="@yield('meta_description', 'Building the Industrial Backbone of Africa.')">
    <title>@yield('title', 'Philbeilts Industrial Group') — Industrial Co. Ltd</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>

<!-- Navigation -->
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            <span class="logo-phil">Philbeilts</span><span class="logo-group">Group</span>
            <small>INDUSTRIAL CO. LTD</small>
        </a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('industries') }}" class="{{ request()->routeIs('industries*') ? 'active' : '' }}">Industries</a></li>
            <li><a href="{{ route('subsidiaries') }}" class="{{ request()->routeIs('subsidiaries') ? 'active' : '' }}">Subsidiaries</a></li>
            <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
            <li><a href="{{ route('news') }}" class="{{ request()->routeIs('news*') ? 'active' : '' }}">News</a></li>
            <li><a href="{{ route('careers') }}" class="{{ request()->routeIs('careers') ? 'active' : '' }}">Careers</a></li>
        </ul>
        <a href="{{ route('contact') }}" class="btn-primary nav-cta">Partner With Us &rarr;</a>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="footer-brand">
            <div class="footer-logo">
                <span class="logo-phil">Philbeilts</span><span class="logo-group">Group</span>
                <small>INDUSTRIAL CO. LTD</small>
            </div>
            <p class="footer-tagline">Building the Industrial Backbone of Africa.</p>
            <div class="footer-socials">
                <a href="#" aria-label="LinkedIn">in</a>
                <a href="#" aria-label="Twitter">𝕏</a>
                <a href="#" aria-label="Facebook">f</a>
            </div>
        </div>
        <div class="footer-cols">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('industries') }}">Our Industries</a></li>
                    <li><a href="{{ route('subsidiaries') }}">Subsidiaries</a></li>
                    <li><a href="{{ route('projects') }}">Projects</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Resources</h4>
                <ul>
                    <li><a href="{{ route('news') }}">News & Insights</a></li>
                    <li><a href="{{ route('careers') }}">Careers</a></li>
                    <li><a href="{{ route('contact') }}">Partner With Us</a></li>
                    <li><a href="{{ route('contact') }}">Investor Relations</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul class="footer-contact-list">
                    <li>
                        <span class="contact-label">Office</span>
                        <span>Tema Ashaiman, Ghana</span>
                    </li>
                    <li>
                        <span class="contact-label">Phone</span>
                        <a href="tel:+233303982238">0303 982 238</a>
                    </li>
                    <li>
                        <span class="contact-label">Phone</span>
                        <a href="tel:+233208576980">0208 576 980</a>
                    </li>
                    <li>
                        <span class="contact-label">Email</span>
                        <a href="mailto:Philbeiltsindustrialgroup@gmail.com">Philbeiltsindustrialgroup@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Philbeilts Industrial Group of Companies Ltd. All rights reserved.</p>
        <p>Incorporated in Ghana &middot; Est. 2023</p>
    </div>
</footer>

<script>
// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
});

// Mobile nav toggle
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');
navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
    navToggle.classList.toggle('open');
});

// Close nav on link click
navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('open');
        navToggle.classList.remove('open');
    });
});

// Intersection Observer for fade-in animations
const fadeEls = document.querySelectorAll('.fade-in');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(el => {
        if (el.isIntersecting) {
            el.target.classList.add('visible');
            observer.unobserve(el.target);
        }
    });
}, { threshold: 0.1 });
fadeEls.forEach(el => observer.observe(el));
</script>
@stack('scripts')
</body>
</html>
