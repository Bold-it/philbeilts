@extends('admin.layout')

@section('title', 'New Career Opening')
@section('page_title', 'Post New Career Opening')
@section('page_subtitle', 'Create a new job posting for the careers page.')

@section('topbar_actions')
    <a href="{{ route('admin.jobs.index') }}" class="btn-adm btn-adm-outline">&larr; Back to Careers</a>
@endsection

@section('content')

<div class="form-card">
    @if($errors->any())
        <div class="adm-alert adm-alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.jobs.store') }}">
        @csrf

        <div class="form-group-adm">
            <label for="title">Role Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Senior Electrical Engineer" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group-adm">
                <label for="department">Department / Subsidiary *</label>
                <input type="text" id="department" name="department" value="{{ old('department') }}" placeholder="e.g. ENERGY, MINING, CONSTRUCTION" required>
            </div>

            <div class="form-group-adm">
                <label for="location">Location *</label>
                <input type="text" id="location" name="location" value="{{ old('location', 'Accra, GH') }}" required>
            </div>
        </div>

        <div class="form-group-adm">
            <label for="employment_type">Employment Type *</label>
            <select id="employment_type" name="employment_type" required>
                <option value="Full-Time" {{ old('employment_type') == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                <option value="Part-Time" {{ old('employment_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                <option value="Executive" {{ old('employment_type') == 'Executive' ? 'selected' : '' }}>Executive</option>
            </select>
        </div>

        <div class="form-group-adm">
            <label for="description">Role Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Responsibilities and overview of the position...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group-adm">
            <label for="requirements">Requirements & Qualifications</label>
            <textarea id="requirements" name="requirements" rows="4" placeholder="Required education, certifications, and years of experience...">{{ old('requirements') }}</textarea>
        </div>

        <div style="margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} style="accent-color: var(--adm-crimson); width: 18px; height: 18px;">
            <label for="is_active" style="font-size: 0.9rem; font-weight: 600; cursor: pointer;">Active opening (visible on careers page)</label>
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn-adm btn-adm-primary" style="padding: 10px 24px;">Post Job Opening</button>
            <a href="{{ route('admin.jobs.index') }}" class="btn-adm btn-adm-outline">Cancel</a>
        </div>
    </form>
</div>

@endsection
