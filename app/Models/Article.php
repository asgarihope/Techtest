<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    protected $fillable = [
        'title',
        'content',
        'created_at'
    ];
}
