<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentResource;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService) {}

    public function index(): JsonResponse
    {
        $articles = $this->articleService->getAllArticles();
        return response()->json(ArticleResource::collection($articles));
    }

    public function show(int $id): JsonResponse
    {
        $article = $this->articleService->getArticleById($id);
        $data = (new ArticleResource($article))->toArray(request());
        $data['comments'] = CommentResource::collection($article->comments);
        return response()->json($data);
    }

    public function store(StoreArticleRequest $request): JsonResponse
    {
        $article = $this->articleService->createArticle($request->validated());
        return response()->json(new ArticleResource($article), 201);
    }

    public function update(UpdateArticleRequest $request, int $id): JsonResponse
    {
        $article = $this->articleService->updateArticle($id, $request->validated());
        return response()->json(new ArticleResource($article));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->articleService->deleteArticle($id);
        return response()->json(['message' => 'Article deleted successfully.']);
    }
}