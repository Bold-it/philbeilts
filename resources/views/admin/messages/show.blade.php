@extends('admin.layout')

@section('title', 'Inquiry Details: ' . $message->subject)
@section('page_title', 'Inquiry Details')
@section('page_subtitle', 'Message reference #MSG-' . str_pad($message->id, 5, '0', STR_PAD_LEFT))

@section('topbar_actions')
    <a href="{{ route('admin.messages.index') }}" class="btn-adm btn-adm-outline">&larr; Back to Inbox</a>
@endsection

@section('content')

<div style="display: grid; grid-template-columns: 1fr 320px; gap: 24px;">
    <!-- Message Content -->
    <div class="form-card" style="max-width: 100%;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; border-bottom: 1px solid var(--adm-border); padding-bottom: 16px;">
            <div>
                <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 6px;">{{ $message->subject }}</h2>
                <div style="font-size: 0.85rem; color: var(--adm-text-muted);">
                    From: <strong>{{ $message->name }}</strong> &lt;<a href="mailto:{{ $message->email }}">{{ $message->email }}</a>&gt;
                </div>
            </div>
            <div style="text-align: right;">
                <div style="font-size: 0.8rem; color: var(--adm-text-muted);">{{ $message->created_at->format('F d, Y, h:i A') }}</div>
                <div style="margin-top: 6px;">
                    <span class="status-pill status-active">Recorded</span>
                </div>
            </div>
        </div>

        <div style="font-size: 0.95rem; line-height: 1.7; color: var(--adm-text); white-space: pre-line; background: #f8fafc; padding: 24px; border-radius: 8px; border: 1px solid var(--adm-border);">
            {{ $message->message }}
        </div>

        <div style="margin-top: 28px; display: flex; gap: 12px; align-items: center;">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="btn-adm btn-adm-primary" style="padding: 10px 20px;">
                Reply via Email &rarr;
            </a>

            <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Delete this message permanently?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-adm btn-adm-danger" style="padding: 10px 16px;">Delete Message</button>
            </form>
        </div>
    </div>

    <!-- Metadata Sidebar -->
    <div>
        <div class="stat-box" style="margin-bottom: 20px;">
            <h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--adm-text-muted); margin-bottom: 16px;">Sender Information</h4>
            <div style="margin-bottom: 12px;">
                <div style="font-size: 0.72rem; color: var(--adm-text-muted); text-transform: uppercase; font-weight: 700;">Full Name</div>
                <div style="font-size: 0.9rem; font-weight: 600;">{{ $message->name }}</div>
            </div>
            <div style="margin-bottom: 12px;">
                <div style="font-size: 0.72rem; color: var(--adm-text-muted); text-transform: uppercase; font-weight: 700;">Email</div>
                <div style="font-size: 0.9rem;"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
            </div>
            @if($message->phone)
            <div style="margin-bottom: 12px;">
                <div style="font-size: 0.72rem; color: var(--adm-text-muted); text-transform: uppercase; font-weight: 700;">Phone</div>
                <div style="font-size: 0.9rem;"><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></div>
            </div>
            @endif
            @if($message->company)
            <div style="margin-bottom: 12px;">
                <div style="font-size: 0.72rem; color: var(--adm-text-muted); text-transform: uppercase; font-weight: 700;">Company</div>
                <div style="font-size: 0.9rem; font-weight: 500;">{{ $message->company }}</div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
