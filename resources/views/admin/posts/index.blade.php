@extends('admin.layout')

@section('title', 'Manage Blog & News')
@section('page_title', 'Blog & News Management')
@section('page_subtitle', 'Create, edit, publish and organize press releases, articles and updates.')

@section('topbar_actions')
    <a href="{{ route('admin.posts.create') }}" class="btn-adm btn-adm-primary">+ Add New Article</a>
@endsection

@section('content')

<div class="card-table">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Category</th>
                <th>Read Time</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>
                    @if($post->is_published)
                        <span class="status-pill status-published">Published</span>
                    @else
                        <span class="status-pill status-draft">Draft</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $post->title }}</strong><br>
                    <small style="color: var(--adm-text-muted);">/news/{{ $post->slug }}</small>
                </td>
                <td><span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: var(--adm-crimson);">{{ $post->category }}</span></td>
                <td>{{ $post->read_time }}</td>
                <td style="color: var(--adm-text-muted); font-size: 0.8rem;">
                    {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}
                </td>
                <td>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">Edit</a>
                        <a href="{{ route('news.show', $post->slug) }}" target="_blank" class="btn-adm btn-adm-outline" style="padding: 4px 10px; font-size: 0.75rem;">View &nearr;</a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" onsubmit="return confirm('Are you sure you want to delete this article?');">
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
                    No articles found. Click "+ Add New Article" to publish your first post.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 20px;">
    {{ $posts->links() }}
</div>

@endsection
