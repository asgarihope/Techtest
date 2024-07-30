<?php

namespace App\Http\Controllers;

use App\Dtos\ArticleDto;
use App\Http\Requests\article\CreateArticleRequest;
use App\Http\Requests\article\UpdateArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\Interfaces\ArticleServiceInterface;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    private ArticleServiceInterface $articleService;

    public function __construct(
        ArticleServiceInterface $articleService,
    )
    {
        $this->articleService = $articleService;
    }

    public function store(CreateArticleRequest $request)
    {
        $this->articleService->createArticle($request->get('title'), $request->get('content'));
        return back()->with('success', trans('message.article.successAdded'));
    }

    public function update($articleID, UpdateArticleRequest $request)
    {
        $this->articleService->updateArticle($articleID, $request->get('title'), $request->get('content'));
        return back()->with('success', trans('message.article.successEdited'));
    }

    public function destroy($articleID)
    {
        $this->articleService->deleteArticle($articleID);
        return redirect(route('panel.index'))->with('success', trans('message.article.successDestroy'));
    }

    public function getArticles(Request $request): ArticleCollection
    {
        $articles = $this->articleService->getArticles($request->get('page', 1), $request->get('perPage', 10));
        return new ArticleCollection($articles);

    }
    public function getArticle(Article $article): ArticleResource
    {
        return new ArticleResource(new ArticleDto(
            $article->id,
            $article->title,
            $article->content,
            $article->created_at
        ));

    }
}
