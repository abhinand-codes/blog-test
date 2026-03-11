<div class="comment" style="{{ $depth > 0 ? 'margin-top: 8px;' : 'margin-top: 16px;' }}">
    <p class="meta">
        <strong>{{ $comment->author }}</strong>
        &middot;
        {{ $comment->created_at->format('M d, Y H:i') }}
    </p>
    <p style="margin: 4px 0;">{{ $comment->body }}</p>

    @if($comment->replies->count() > 0)
        @foreach($comment->replies as $reply)
            @include('frontend.articles.partials.comment', [
                'comment' => $reply,
                'depth'   => $depth + 1
            ])
        @endforeach
    @endif
</div>