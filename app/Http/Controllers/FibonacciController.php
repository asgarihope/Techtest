<?php

namespace App\Http\Controllers;

use App\Dtos\ArticleDto;
use App\Http\Requests\article\CreateArticleRequest;
use App\Http\Requests\article\UpdateArticleRequest;
use App\Http\Requests\FibonacciRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\Interfaces\ArticleServiceInterface;
use App\Services\Interfaces\FibonacciServiceInterface;
use Illuminate\Http\Request;


class FibonacciController extends Controller
{
    private FibonacciServiceInterface $fibonacciService;

    public function __construct(
        FibonacciServiceInterface $fibonacciService
    )
    {
        $this->fibonacciService = $fibonacciService;
    }

    public function index(FibonacciRequest $request)
    {


        return view('fibonacci', [
            'fibonacci' => $request->has('number') ? $this->fibonacciService->compute($request->get('number')) : 0
        ]);
    }
}
