<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleScholarService;
use App\Services\GoogleScholarServices;

class FetchGoogleScholarPublications extends Command
{
    protected $signature = 'scholar:fetch {authorId}';
    protected $description = 'Fetch Google Scholar publications for the given author ID';

    protected $googleScholarService;

    public function __construct(GoogleScholarServices $googleScholarService)
    {
        parent::__construct();
        $this->googleScholarService = $googleScholarService;
    }

    public function handle()
    {
        $authorId = $this->argument('authorId');
        $publications = $this->googleScholarService->getPublications($authorId);
    
        // Inspect the structure of the response
        dd($publications);
    
        if ($publications && isset($publications['articles'])) {
            $this->info("Publications for Author ID: $authorId");
            foreach ($publications['articles'] as $article) {
                $this->line("Title: " . $article['title']);
                $this->line("Link: " . $article['link']);
                
                // Check if 'cited_by' is an array or a value
                if (is_array($article['cited_by'])) {
                    // Handle array if needed
                    $this->line("Citations: " . implode(', ', $article['cited_by'])); // Example of converting array to string
                } else {
                    $this->line("Citations: " . $article['cited_by']);
                }
                $this->line("----------");
            }
        } else {
            $this->error("No publications found for Author ID: $authorId");
        }
    }
    
}
