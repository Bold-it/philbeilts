@extends('admin.layout')

@section('title', 'Website Inquiries Inbox')
@section('page_title', 'Messages Inbox')
@section('page_subtitle', 'Review incoming partnership, investor, and contracting inquiries from the website form.')

@section('topbar_actions')
    <div style="display: flex; gap: 8px;">
        <a href="{{ route('admin.messages.index') }}" class="btn-adm {{ !request()->has('unread') ? 'btn-adm-primary' : 'btn-adm-outline' }}">All Messages</a>
        <a href="{{ route('admin.messages.index', ['unread' => 1]) }}" class="btn-adm {{ request()->has('unread') ? 'btn-adm-primary' : 'btn-adm-outline' }}">
            Unread Only ({{ $unreadCount }})
        </a>
    </div>
@endsection

@section('content')

<div class="card-table">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Sender</th>
                <th>Subject</th>
                <th>Company / Phone</th>
                <th>Date Received</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
            <tr style="{{ !$msg->is_read ? 'background: #fff8f8;' : '' }}">
                <td>
                    @if(!$msg->is_read)
                        <span class="status-pill status-unread">New</span>
                    @else
                        <span class="status-pill status-inactive">Read</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $msg->name }}</strong><br>
                    <a href="mailto:{{ $msg->email }}" style="color: var(--adm-text-muted); font-size: 0.8rem; text-decoration: none;">{{ $msg->email }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.messages.show', $msg->id) }}" style="text-decoration: none; color: var(--adm-text); font-weight: 600;">
                        {{ Str::limit($msg->subject, 40) }}
                    </a>
                </td>
                <td style="font-size: 0.82rem; color: var(--adm-text-muted);">
                    {{ $msg->company ?? '—' }}<br>
                    {{ $msg->phone ?? '' }}
                </td>
                <td style="color: var(--adm-text-muted); font-size: 0.8rem;">
                    {{ $msg->created_at->format('M d, Y h:i A') }}
                </td>
                <td>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-adm btn-adm-primary" style="padding: 4px 10px; font-size: 0.75rem;">Read</a>
                        <form method="POST" action="{{ route('admin.messages.toggle-read', $msg->id) }}">
                            @csrf
                            <button type="submit" class="btn-adm btn-adm-outline" style="padding: 4px 8px; font-size: 0.75rem;">
                                {{ $msg->is_read ? 'Mark Unread' : 'Mark Read' }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg->id) }}" onsubmit="return confirm('Delete this message permanently?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-adm btn-adm-danger" style="padding: 4px 8px; font-size: 0.75rem;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; color: var(--adm-text-muted); padding: 40px;">
                    No inquiries in this folder.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 20px;">
    {{ $messages->links() }}
</div>

@endsection
