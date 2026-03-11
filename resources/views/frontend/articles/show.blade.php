@extends('layouts.app')

@section('content')
    <p><a href="{{ route('home') }}">&larr; Back to articles</a></p>

    <h1>{{ $article->title }}</h1>
    <p class="meta">Published on {{ $article->created_at->format('M d, Y') }}</p>

    <div style="line-height: 1.7; margin-bottom: 40px;">
        {{ $article->body }}
    </div>

    <hr>
    <h3>Comments</h3>

    @forelse($article->comments as $comment)
        @include('frontend.articles.partials.comment', [
            'comment' => $comment,
            'depth'   => 0
        ])
    @empty
        <p style="color:#888;">No comments yet.</p>
    @endforelse
@endsection