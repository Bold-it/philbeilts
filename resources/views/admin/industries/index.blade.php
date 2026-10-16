@extends('admin.layout')

@section('title', 'Manage Industries')
@section('page_title', 'Industries Management')
@section('page_subtitle', 'Add, edit, reorder or delete the industry sectors displayed on the website.')

@section('topbar_actions')
    <a href="{{ route('admin.industries.create') }}" class="btn-adm btn-adm-primary">+ Add New Industry</a>
@endsection

@section('content')

<div class="card-table">
    <table class="admin-table">
        <thead>
            <tr>
                <th style="width: 50px;">Order</th>
                <th style="width: 50px;">Icon</th>
                <th>Roman</th>
                <th>Title</th>
                <th>Short Description</th>
                <th>Color</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($industries as $industry)
            <tr>
                <td style="text-align: center; font-weight: 700; color: var(--adm-text-muted);">{{ $industry->sort_order }}</td>
                <td style="font-size: 1.5rem; text-align: center;">{{ $industry->icon }}</td>
                <td style="font-weight: 700; color: var(--adm-crimson);">{{ $industry->roman }}</td>
                <td>
                    <strong>{{ $industry->title }}</strong><br>
                    <small style="color: var(--adm-text-muted);">/industries/{{ $industry->slug }}</small>
                </td>
                <td style="font-size: 0.8rem; color: var(--adm-text-muted); max-width: 280px;">
                    {{ Str::limit($industry->short, 80) }}
                </td>
                <td>
                    <span style="display: inline-flex; align-items: center; gap: 6px;">
                        <span style="width: 16px; height: 16px; border-radius: 50%; background: {{ $industry->color }}; display: inline-block; border: 1px solid rgba(255,255,255,0.2);"></span>
                        <code style="font-size: 0.72rem;">{{ $industry->color }}</code>
                    </span>
                </td>
                <td>
                    @if($industry->is_active)
                        <span class="status-pill status-published">Active</span>
                    @else
                        <span class="status-pill status-draft">Hidden</span>
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.industries.edit', $industry->id) }}" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">Edit</a>
                        <form method="POST" action="{{ route('admin.industries.destroy', $industry->id) }}"
                              onsubmit="return confirm('Delete the &quot;{{ $industry->title }}&quot; industry? This cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-adm btn-adm-danger" style="padding: 4px 8px; font-size: 0.75rem;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; color: var(--adm-text-muted); padding: 40px;">
                    No industries found. Click "+ Add New Industry" to get started.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
