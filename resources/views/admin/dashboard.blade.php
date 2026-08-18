@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Overview & Analytics')
@section('page_subtitle', 'Real-time summary of blog publications, career openings, and customer inquiries.')

@section('topbar_actions')
    <a href="{{ route('admin.posts.create') }}" class="btn-adm btn-adm-primary">+ New Blog Post</a>
@endsection

@section('content')

<!-- Metric Cards -->
<div class="stats-grid">
    <div class="stat-box">
        <div class="stat-box-title">Unread Messages</div>
        <div class="stat-box-num" style="color: var(--adm-crimson);">{{ $stats['unread_messages'] }}</div>
        <div class="stat-box-sub">{{ $stats['total_messages'] }} total received</div>
    </div>
    <div class="stat-box">
        <div class="stat-box-title">Published Articles</div>
        <div class="stat-box-num">{{ $stats['published_posts'] }}</div>
        <div class="stat-box-sub">{{ $stats['total_posts'] }} total drafts & articles</div>
    </div>
    <div class="stat-box">
        <div class="stat-box-title">Active Job Roles</div>
        <div class="stat-box-num">{{ $stats['active_jobs'] }}</div>
        <div class="stat-box-sub">{{ $stats['total_jobs'] }} listed positions</div>
    </div>
    <div class="stat-box">
        <div class="stat-box-title">Primary Domain</div>
        <div class="stat-box-num" style="font-size: 1.25rem; font-family: monospace; padding-top: 10px;">philbeiltsgroup.com</div>
        <div class="stat-box-sub">Production Ready</div>
    </div>
</div>

<!-- Recent Inquiries Table -->
<div class="card-table">
    <div class="card-table-header">
        <h3>Recent Website Inquiries</h3>
        <a href="{{ route('admin.messages.index') }}" class="btn-adm btn-adm-outline">View All Messages &rarr;</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Sender</th>
                <th>Subject</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentMessages as $msg)
            <tr>
                <td>
                    @if(!$msg->is_read)
                        <span class="status-pill status-unread">New</span>
                    @else
                        <span class="status-pill status-inactive">Read</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $msg->name }}</strong><br>
                    <small style="color: var(--adm-text-muted);">{{ $msg->email }}</small>
                </td>
                <td>{{ Str::limit($msg->subject, 40) }}</td>
                <td style="color: var(--adm-text-muted); font-size: 0.8rem;">{{ $msg->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: var(--adm-text-muted); padding: 32px;">No inquiries received yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Recent Posts Table -->
<div class="card-table">
    <div class="card-table-header">
        <h3>Recent Blog & News Posts</h3>
        <a href="{{ route('admin.posts.index') }}" class="btn-adm btn-adm-outline">Manage All Posts &rarr;</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentPosts as $post)
            <tr>
                <td>
                    @if($post->is_published)
                        <span class="status-pill status-published">Published</span>
                    @else
                        <span class="status-pill status-draft">Draft</span>
                    @endif
                </td>
                <td>
                    <strong>{{ Str::limit($post->title, 55) }}</strong>
                </td>
                <td><span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: var(--adm-crimson);">{{ $post->category }}</span></td>
                <td style="color: var(--adm-text-muted); font-size: 0.8rem;">{{ $post->created_at->format('M d, Y') }}</td>
                <td>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">Edit</a>
                        <a href="{{ route('news.show', $post->slug) }}" target="_blank" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">View &nearr;</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: var(--adm-text-muted); padding: 32px;">No posts created yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
