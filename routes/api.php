<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ArticleController::class,'getArticles']);
Route::get('/articles/{article:id}', [ArticleController::class,'getArticle']);
