<?php namespace App\Services\Interfaces;

use App\Dtos\ArticleDto;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceInterface
{
    public function createArticle(string $title, string $content): ArticleDto;

    public function updateArticle(int $articleID, string $title, string $content): bool;

    public function getArticleByID(int $articleID): ?ArticleDto;

    public function getArticles(int $page = 1, int $perPage = 10): LengthAwarePaginator;

    public function deleteArticle(int $articleID): bool;

}
