<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `GetArticleById`; CREATE PROCEDURE `GetArticleById`(IN `articleID` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT * FROM articles WHERE id=articleID");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `GetArticleById`;");
    }
};