@extends('layouts.app')

@section('content')
    <h1>Latest Articles</h1>

    @forelse($articles as $article)
        <div class="card">
            <h2>
                <a href="{{ route('articles.show', $article->id) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="meta">{{ $article->created_at->format('M d, Y') }}</p>
            <p>{{ \Illuminate\Support\Str::limit($article->body, 100) }}</p>
            <a href="{{ route('articles.show', $article->id) }}">Read more →</a>
        </div>
    @empty
        <p>No articles found.</p>
    @endforelse
@endsection