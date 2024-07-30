<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ArticleServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class PanelController extends Controller
{
    private ArticleServiceInterface $articleService;

    public function __construct(
        ArticleServiceInterface $articleService
    )
    {

        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $editArticle = null;
        $articles = $this->articleService->getArticles($request->get('page', 1), 5);
        if ($request->has('edit')) {
            $editArticle = $this->articleService->getArticleByID($request->get('edit'));
            throw_if(!$editArticle, ModelNotFoundException::class);
        }
        return view('panel.index', [
            'articles' => $articles,
            'editArticle' => $editArticle
        ]);
    }
}
