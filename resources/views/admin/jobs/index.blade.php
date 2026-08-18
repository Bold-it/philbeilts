@extends('admin.layout')

@section('title', 'Manage Careers & Open Positions')
@section('page_title', 'Career Openings')
@section('page_subtitle', 'Manage job vacancies, departments, descriptions and application links displayed on the website.')

@section('topbar_actions')
    <a href="{{ route('admin.jobs.create') }}" class="btn-adm btn-adm-primary">+ Post New Opening</a>
@endsection

@section('content')

<div class="card-table">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Role Title</th>
                <th>Department</th>
                <th>Location</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job)
            <tr>
                <td>
                    @if($job->is_active)
                        <span class="status-pill status-active">Active</span>
                    @else
                        <span class="status-pill status-inactive">Closed</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $job->title }}</strong>
                </td>
                <td><span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: var(--adm-crimson);">{{ $job->department }}</span></td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->employment_type }}</td>
                <td>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">Edit</a>
                        <form method="POST" action="{{ route('admin.jobs.toggle', $job->id) }}">
                            @csrf
                            <button type="submit" class="btn-adm btn-adm-outline" style="padding: 4px 8px; font-size: 0.75rem;">
                                {{ $job->is_active ? 'Close' : 'Activate' }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.jobs.destroy', $job->id) }}" onsubmit="return confirm('Delete this job position?');">
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
                    No career postings yet. Click "+ Post New Opening" to add a position.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 20px;">
    {{ $jobs->links() }}
</div>

@endsection
