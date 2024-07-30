<?php

namespace App\Repository;

use App\Dtos\ArticleDto;
use App\Models\Article;
use App\Repository\Interfaces\ArticleRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends _BaseRepository implements ArticleRepositoryInterface
{

    public function __construct(Article $model)
    {
        parent::__construct($model);
    }


    public function createArticle(string $title, string $content): ArticleDto
    {
        $article = $this->model->newQuery()->create([
            'title' => $title,
            'content' => $content
        ]);
        return new ArticleDTO(
            $article->id,
            $article->title,
            $article->content,
            $article->created_at
        );
    }

    public function getArticleByID(int $articleID): ?ArticleDto
    {
        $article = DB::select('CALL GetArticleById(?)', [$articleID]);
        if (count($article)) {
            $article = $article[0];
            return new ArticleDTO(
                $article->id,
                $article->title,
                $article->content,
                Carbon::make($article->created_at)
            );
        }

        return null;
    }

    public function getArticles(int $page = 1, int $perPage = 10): LengthAwarePaginator
    {
        $paginator = $this->model->newQuery()->orderBy('id', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)->onEachSide(1);
        $paginator->getCollection()->transform(function ($user) {
            return new ArticleDto(
                $user->id,
                $user->title,
                $user->content,
                $user->created_at,
            );
        });

        return $paginator;
    }

    public function deleteArticle(int $articleID): bool
    {
        return $this->model->newQuery()->where('id', $articleID)->delete();
    }
}
