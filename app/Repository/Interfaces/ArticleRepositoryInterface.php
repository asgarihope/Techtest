<?php

namespace App\Repository\Interfaces;

use App\Dtos\ArticleDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface extends _BaseRepositoryInterface
{
    public function createArticle(string $title, string $content): ArticleDto;

    public function getArticleByID(int $articleID): ?ArticleDto;

    public function getArticles(int $page = 1, int $perPage = 10): LengthAwarePaginator;

    public function deleteArticle(int $articleID): bool;

}
