<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    public function __construct(
        protected ArticleRepositoryInterface $articleRepository
    ) {}

    public function getLatestArticles(int $limit = 5): Collection
    {
        return $this->articleRepository->getLatest($limit);
    }

    public function getAllArticles(): Collection
    {
        return $this->articleRepository->getAll();
    }

    public function getArticleById(int $id): Article
    {
        return $this->articleRepository->findById($id);
    }

    public function createArticle(array $data): Article
    {
        return $this->articleRepository->create($data);
    }

    public function updateArticle(int $id, array $data): Article
    {
        return $this->articleRepository->update($id, $data);
    }

    public function deleteArticle(int $id): bool
    {
        return $this->articleRepository->delete($id);
    }
}