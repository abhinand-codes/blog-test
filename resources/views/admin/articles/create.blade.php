@extends('layouts.app')

@section('content')
    <p><a href="{{ route('admin.articles.index') }}">&larr; Back to articles</a></p>
    <h1>New Article</h1>

    @if($errors->any())
        <div class="flash-error">
            @foreach($errors->all() as $error)
                <p style="margin: 4px 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf

        <label for="title">Title <span style="color:#888;font-weight:normal;">(max 50 characters)</span></label>
        <input type="text"
               id="title"
               name="title"
               maxlength="50"
               value="{{ old('title') }}"
               placeholder="Enter article title"
               oninput="document.getElementById('char-count').textContent = this.value.length + '/50'">
        <p class="char-count" id="char-count">0/50</p>

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="body">Body</label>
        <textarea id="body"
                  name="body"
                  rows="10"
                  placeholder="Enter article body">{{ old('body') }}</textarea>

        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">Publish Article</button>
        <a href="{{ route('admin.articles.index') }}"
           class="btn btn-secondary"
           style="margin-left: 8px;">Cancel</a>
    </form>
@endsection