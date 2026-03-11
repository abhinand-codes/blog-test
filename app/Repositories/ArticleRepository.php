<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(protected Article $model) {}

    public function getLatest(int $limit = 5): Collection
    {
        return $this->model->latest()->limit($limit)->get();
    }

    public function getAll(): Collection
    {
        return $this->model->latest()->get();
    }

    public function findById(int $id): Article
    {
        return $this->model->with('comments.replies')->findOrFail($id);
    }

    public function create(array $data): Article
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Article
    {
        $article = $this->model->findOrFail($id);
        $article->update($data);
        return $article->fresh();
    }

    public function delete(int $id): bool
    {
        $article = $this->model->findOrFail($id);
        return $article->delete();
    }
}