<?php

namespace App\Repositories\Interfaces;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    public function getLatest(int $limit): Collection;
    public function getAll(): Collection;
    public function findById(int $id): Article;
    public function create(array $data): Article;
    public function update(int $id, array $data): Article;
    public function delete(int $id): bool;
}