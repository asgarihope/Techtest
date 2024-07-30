<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:articles {count : The number of articles to generate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a specified number of articles using a factory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = (int)$this->argument('count');

        if ($count <= 0) {
            $this->error('The count must be a positive integer.');
            return;
        }

        DB::beginTransaction();

        try {
            Article::factory()->count($count)->create();

            DB::commit();
            $this->info("Successfully created {$count} articles.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Failed to generate articles: ' . $e->getMessage());
        }
    }
}
