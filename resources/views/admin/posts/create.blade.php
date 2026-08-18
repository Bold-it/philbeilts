@extends('admin.layout')

@section('title', 'New Blog Post')
@section('page_title', 'Create New Article')
@section('page_subtitle', 'Write and publish an update or press release.')

@section('topbar_actions')
    <a href="{{ route('admin.posts.index') }}" class="btn-adm btn-adm-outline">&larr; Back to Posts</a>
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

    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf

        <div class="form-group-adm">
            <label for="title">Article Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Philbeilts expands logistics infrastructure" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group-adm">
                <label for="category">Category *</label>
                <select id="category" name="category" required>
                    <option value="PARTNERSHIPS" {{ old('category') == 'PARTNERSHIPS' ? 'selected' : '' }}>PARTNERSHIPS</option>
                    <option value="OPERATIONS" {{ old('category') == 'OPERATIONS' ? 'selected' : '' }}>OPERATIONS</option>
                    <option value="INFRASTRUCTURE" {{ old('category') == 'INFRASTRUCTURE' ? 'selected' : '' }}>INFRASTRUCTURE</option>
                    <option value="MINING" {{ old('category') == 'MINING' ? 'selected' : '' }}>MINING</option>
                    <option value="ENERGY" {{ old('category') == 'ENERGY' ? 'selected' : '' }}>ENERGY</option>
                    <option value="AGRICULTURE" {{ old('category') == 'AGRICULTURE' ? 'selected' : '' }}>AGRICULTURE</option>
                    <option value="COMPANY NEWS" {{ old('category') == 'COMPANY NEWS' ? 'selected' : '' }}>COMPANY NEWS</option>
                </select>
            </div>

            <div class="form-group-adm">
                <label for="read_time">Estimated Read Time *</label>
                <input type="text" id="read_time" name="read_time" value="{{ old('read_time', '4 min read') }}" required>
            </div>
        </div>

        <div class="form-group-adm">
            <label for="slug">URL Slug (Optional - auto-generated from title)</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e.g. philbeilts-expands-logistics">
        </div>

        <div class="form-group-adm">
            <label for="excerpt">Excerpt / Summary (Appears on cards & preview)</label>
            <textarea id="excerpt" name="excerpt" rows="3" placeholder="Brief summary of the article...">{{ old('excerpt') }}</textarea>
        </div>

        <div class="form-group-adm">
            <label for="content">Full Article Content (HTML allowed) *</label>
            <textarea id="content" name="content" rows="12" placeholder="Write your full article paragraphs here..." required>{{ old('content') }}</textarea>
            <small style="color: var(--adm-text-muted);">You can include standard HTML tags like &lt;p&gt;, &lt;h3&gt;, &lt;strong&gt;, &lt;ul&gt;, &lt;li&gt;, etc.</small>
        </div>

        <div style="margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} style="accent-color: var(--adm-crimson); width: 18px; height: 18px;">
            <label for="is_published" style="font-size: 0.9rem; font-weight: 600; cursor: pointer;">Publish immediately to website</label>
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn-adm btn-adm-primary" style="padding: 10px 24px;">Save & Publish Article</button>
            <a href="{{ route('admin.posts.index') }}" class="btn-adm btn-adm-outline">Cancel</a>
        </div>
    </form>
</div>

@endsection
