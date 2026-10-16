@extends('admin.layout')

@section('title', 'Edit Industry')
@section('page_title', 'Edit Industry: ' . $industry->title)
@section('page_subtitle', 'Update the industry card details displayed on the public website.')

@section('topbar_actions')
    <a href="{{ route('admin.industries.index') }}" class="btn-adm btn-adm-outline">&larr; Back to Industries</a>
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

    <form method="POST" action="{{ route('admin.industries.update', $industry->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group-adm" style="grid-column: 1 / -1;">
                <label for="title">Industry Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $industry->title) }}"
                       placeholder="e.g. Real Estate & Infrastructure" required>
            </div>

            <div class="form-group-adm">
                <label for="roman">Roman Numeral *</label>
                <input type="text" id="roman" name="roman" value="{{ old('roman', $industry->roman) }}"
                       placeholder="e.g. I, II, III, X" maxlength="10" required>
            </div>

            <div class="form-group-adm">
                <label for="sort_order">Display Order *</label>
                <input type="number" id="sort_order" name="sort_order"
                       value="{{ old('sort_order', $industry->sort_order) }}"
                       min="0" max="99" required>
                <small style="color: var(--adm-text-muted);">Lower number = displayed first</small>
            </div>
        </div>

        <div class="form-group-adm">
            <label for="short">Short Description (card text) *</label>
            <textarea id="short" name="short" rows="3" maxlength="300"
                      placeholder="Brief description shown on the industry card..."
                      required>{{ old('short', $industry->short) }}</textarea>
        </div>

        {{-- Industry Card Image --}}
        <div class="form-group-adm">
            <label>Industry Card Image</label>
            <div style="border: 2px dashed var(--adm-border); border-radius: 10px; padding: 28px; text-align: center; background: var(--adm-surface);">

                {{-- Existing image preview --}}
                @if($industry->image_url)
                <div id="current-image" style="margin-bottom: 16px;">
                    <img src="{{ $industry->image_url }}" alt="{{ $industry->title }}"
                         style="max-height: 180px; max-width: 100%; border-radius: 8px; object-fit: cover; border: 1px solid var(--adm-border);">
                    <div style="margin-top: 10px;">
                        <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.82rem; color: #ef4444; cursor: pointer; font-weight: 600;">
                            <input type="checkbox" name="remove_image" value="1"
                                   onchange="toggleRemove(this)"
                                   style="accent-color: #ef4444;">
                            Remove current image
                        </label>
                    </div>
                </div>
                @endif

                {{-- New upload preview --}}
                <div id="image-preview" style="display: none; margin-bottom: 16px;">
                    <img id="preview-img" src="" alt="Preview"
                         style="max-height: 180px; max-width: 100%; border-radius: 8px; object-fit: cover; border: 1px solid var(--adm-border);">
                </div>

                <div id="upload-placeholder" style="color: var(--adm-text-muted); margin-bottom: 12px; {{ $industry->image_url ? 'display:none;' : '' }}">
                    <div style="font-size: 2rem; margin-bottom: 8px;">🖼️</div>
                    <div style="font-size: 0.85rem;">JPG, PNG or WebP &mdash; max 3 MB</div>
                    <div style="font-size: 0.75rem; margin-top: 4px;">Recommended: 800×500px</div>
                </div>

                <label for="image" class="btn-adm btn-adm-outline" style="cursor: pointer; display: inline-block; margin-top: 8px;">
                    {{ $industry->image_url ? 'Replace Image' : 'Choose Image' }}
                </label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"
                       style="display: none;" onchange="previewImage(this)">
            </div>
        </div>

        {{-- Fallback icon --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group-adm">
                <label for="icon">Fallback Icon Emoji <small style="font-weight:400; color:var(--adm-text-muted);">(shown if no image)</small></label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', $industry->icon) }}"
                       placeholder="🏗️" maxlength="10" required
                       style="font-size: 1.4rem; letter-spacing: 4px;">
            </div>

            <div class="form-group-adm">
                <label for="color">Accent Color *</label>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="color" id="color_picker" value="{{ old('color', $industry->color) }}"
                           style="width: 48px; height: 38px; border: none; cursor: pointer; border-radius: 6px; padding: 2px;"
                           oninput="document.getElementById('color').value = this.value">
                    <input type="text" id="color" name="color" value="{{ old('color', $industry->color) }}"
                           placeholder="#8B6914" maxlength="20" required
                           oninput="document.getElementById('color_picker').value = this.value">
                </div>
                <small style="color: var(--adm-text-muted);">Used as fallback background when no image is set</small>
            </div>
        </div>

        <div style="margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="is_active" name="is_active" value="1"
                   {{ old('is_active', $industry->is_active) ? 'checked' : '' }}
                   style="accent-color: var(--adm-crimson); width: 18px; height: 18px;">
            <label for="is_active" style="font-size: 0.9rem; font-weight: 600; cursor: pointer;">
                Active (visible on website)
            </label>
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn-adm btn-adm-primary" style="padding: 10px 24px;">Save Changes</button>
            <a href="{{ route('admin.industries.index') }}" class="btn-adm btn-adm-outline">Cancel</a>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const placeholder = document.getElementById('upload-placeholder');
    const current = document.getElementById('current-image');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
            if (current) current.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function toggleRemove(checkbox) {
    const current = document.getElementById('current-image');
    if (current) current.style.opacity = checkbox.checked ? '0.3' : '1';
}
</script>

@endsection
