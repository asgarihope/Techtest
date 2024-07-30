<?php

namespace App\Documentation;

use OpenApi\Annotations as OA;


/**
 * @OA\Get(
 *     path="/api/articles/{id}",
 *     tags={"Article"},
 *     summary="Fetch a single article by ID",
 *     @OA\Parameter(description="ID of article to fetch",in="path",name="id",required=true,@OA\Schema(format="int64", type="integer")),
 *     @OA\Response(response=200,description="Success",
 *         @OA\JsonContent(type="object",@OA\Property(property="data",ref="#/components/schemas/ArticleResource"))
 *     ),
 *     @OA\Response(response=404,description="Article not found")
 * )
 * @OA\Get(
 *     path="/api/articles",
 *     tags={"Article"},
 *     summary="Fetch a list of articles",
 *     @OA\Parameter(name="page",description="Number of page",example=1,in="query",@OA\Schema(type="integer")),
 *     @OA\Parameter(name="perPage",description="Number of articles per page",example=10,in="query",@OA\Schema(type="integer")),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/ArticleResource")),
 *             @OA\Property(property="current_page",type="integer"),
 *             @OA\Property(property="last_page",type="integer"),
 *             @OA\Property(property="total",type="integer")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No articles found"
 *     )
 * )
 * @OA\Schema(
 *     schema="ArticleResource",
 *     description="",
 *     @OA\Property(property="id", type="integer",description="Id of article"),
 *     @OA\Property(property="title", type="string",description="Title of article"),
 *     @OA\Property(property="content", type="string",description="Content of article"),
 *     @OA\Property(property="short_content", type="string",description="Short Content of article"),
 *     @OA\Property(property="published_at", type="date",description="Published At of article"),
 * )
 */
class Article
{

}
