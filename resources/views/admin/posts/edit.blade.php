@extends('admin.layout')

@section('title', 'Edit Article')
@section('page_title', 'Edit Article: ' . $post->title)
@section('page_subtitle', 'Update content, category, or publishing status.')

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

    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group-adm">
            <label for="title">Article Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group-adm">
                <label for="category">Category *</label>
                <select id="category" name="category" required>
                    @foreach(['PARTNERSHIPS', 'OPERATIONS', 'INFRASTRUCTURE', 'MINING', 'ENERGY', 'AGRICULTURE', 'COMPANY NEWS'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $post->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group-adm">
                <label for="read_time">Estimated Read Time *</label>
                <input type="text" id="read_time" name="read_time" value="{{ old('read_time', $post->read_time) }}" required>
            </div>
        </div>

        <div class="form-group-adm">
            <label for="slug">URL Slug *</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
        </div>

        <div class="form-group-adm">
            <label for="excerpt">Excerpt / Summary</label>
            <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div class="form-group-adm">
            <label for="content">Full Article Content (HTML allowed) *</label>
            <textarea id="content" name="content" rows="12" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div style="margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} style="accent-color: var(--adm-crimson); width: 18px; height: 18px;">
            <label for="is_published" style="font-size: 0.9rem; font-weight: 600; cursor: pointer;">Published on public website</label>
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn-adm btn-adm-primary" style="padding: 10px 24px;">Update Article</button>
            <a href="{{ route('admin.posts.index') }}" class="btn-adm btn-adm-outline">Cancel</a>
        </div>
    </form>
</div>

@endsection
