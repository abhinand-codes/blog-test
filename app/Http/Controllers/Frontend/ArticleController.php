<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService) {}

    public function index()
    {
        $articles = $this->articleService->getLatestArticles(5);
        return view('frontend.articles.index', compact('articles'));
    }

    public function show(int $id)
    {
        $article = $this->articleService->getArticleById($id);
        return view('frontend.articles.show', compact('article'));
    }
}