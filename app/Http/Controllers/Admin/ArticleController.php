<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService) {}

    public function index()
    {
        $articles = $this->articleService->getAllArticles();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $this->articleService->createArticle($request->validated());
        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article created successfully.');
    }

    public function edit(int $id)
    {
        $article = $this->articleService->getArticleById($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, int $id): RedirectResponse
    {
        $this->articleService->updateArticle($id, $request->validated());
        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->articleService->deleteArticle($id);
        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article deleted successfully.');
    }
}