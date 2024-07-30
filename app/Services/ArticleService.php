<?php

namespace App\Services;

use App\Dtos\ArticleDto;
use App\Repository\Interfaces\ArticleRepositoryInterface;
use App\Services\Interfaces\ArticleServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 */
class ArticleService implements ArticleServiceInterface
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
    )
    {
        $this->articleRepository = $articleRepository;
    }


    public function createArticle(string $title, string $content): ArticleDto
    {
        return $this->articleRepository->createArticle($title, $content);
    }

    public function updateArticle(int $articleID, string $title, string $content): bool
    {
        return $this->articleRepository->updateBy('id', $articleID, [
            'content' => $content,
            'title' => $title
        ]);
    }


    public function getArticleByID(int $articleID): ?ArticleDto
    {
        return $this->articleRepository->getArticleByID($articleID);
    }

    public function getArticles(int $page = 1, int $perPage = 10): LengthAwarePaginator
    {
        return $this->articleRepository->getArticles($page, $perPage);
    }

    public function deleteArticle(int $articleID): bool
    {
        return $this->articleRepository->deleteArticle($articleID);
    }
}
