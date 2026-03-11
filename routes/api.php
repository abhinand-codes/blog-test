<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('articles', ArticleController::class)->names([
    'index'   => 'api.articles.index',
    'show'    => 'api.articles.show',
    'store'   => 'api.articles.store',
    'update'  => 'api.articles.update',
    'destroy' => 'api.articles.destroy',
]);