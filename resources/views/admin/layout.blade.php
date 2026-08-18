<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') — Philbeilts Group</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<!-- Sidebar -->
<aside class="admin-sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" style="text-decoration: none;">
            <span class="sidebar-logo-phil">Philbeilts</span><span class="sidebar-logo-grp">Group</span>
            <span class="sidebar-sub">Admin Console</span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-heading">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span>📊</span> Dashboard
        </a>

        <div class="nav-heading">Content Management</div>
        <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
            <span>📰</span> Blog / News
        </a>
        <a href="{{ route('admin.jobs.index') }}" class="sidebar-link {{ request()->routeIs('admin.jobs*') ? 'active' : '' }}">
            <span>💼</span> Job Openings
        </a>

        <div class="nav-heading">Inquiries</div>
        <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
            <span>✉️</span> Messages Inbox
            @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
            @if($unread > 0)
                <span class="badge-count">{{ $unread }}</span>
            @endif
        </a>

        <div class="nav-heading">System</div>
        <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <span>⚙️</span> System Settings
        </a>
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
            <span>🌐</span> View Live Website &nearr;
        </a>
    </nav>

    <div class="sidebar-footer">
        <div>
            <div style="font-weight: 600; font-size: 0.85rem;">{{ Auth::user()->name ?? 'Admin' }}</div>
            <div style="font-size: 0.72rem; color: #94a3b8;">{{ Auth::user()->email ?? '' }}</div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn-adm btn-adm-danger" style="padding: 4px 8px; font-size: 0.75rem;">Logout</button>
        </form>
    </div>
</aside>

<!-- Main Area -->
<main class="admin-main">
    <header class="admin-topbar">
        <div class="topbar-title">
            <h1>@yield('page_title', 'Dashboard')</h1>
            <p>@yield('page_subtitle', 'Manage Philbeilts Industrial Group CMS and Operations')</p>
        </div>
        <div>
            @yield('topbar_actions')
        </div>
    </header>

    <div class="admin-body">
        @if(session('success'))
            <div class="adm-alert adm-alert-success">
                <span>✓ {{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="adm-alert adm-alert-error">
                <span>⚠ {{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </div>
</main>

</body>
</html>
