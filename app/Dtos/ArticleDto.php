<?php

namespace App\Dtos;

use Carbon\Carbon;

class ArticleDto
{
    public function __construct(
        public int    $id,
        public string $title,
        public string $content,
        public Carbon $createdAt
    )
    {

    }

}
