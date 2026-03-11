@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Admin — All Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn">+ New Article</a>
    </div>

    @if($articles->isEmpty())
        <p>No articles yet. <a href="{{ route('admin.articles.create') }}">Create one</a>.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $index => $article)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('articles.show', $article->id) }}"
                               class="btn btn-secondary btn-sm"
                               target="_blank">View</a>

                            <a href="{{ route('admin.articles.edit', $article->id) }}"
                               class="btn btn-sm"
                               style="margin: 0 4px;">Edit</a>

                            <form action="{{ route('admin.articles.destroy', $article->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this article?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection