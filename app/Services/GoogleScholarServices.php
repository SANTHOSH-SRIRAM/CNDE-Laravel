<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GoogleScholarServices
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        // Set this key from the .env file
        $this->apiKey = env('SERPAPI_KEY');
        $this->client = new Client();
    }

    public function getPublications($authorId)
    {
        $url = 'https://serpapi.com/search.json';
        $publications = [];
        $page = 0; // Initialize page number
        $hasMore = true; // Flag to track if more results are available
    
        try {
            while ($hasMore) {
                // Make the API request
                $response = $this->client->request('GET', $url, [
                    'query' => [
                        'engine' => 'google_scholar_author',
                        'author_id' => $authorId,
                        'api_key' => $this->apiKey,
                        'start' => $page * 100, // Adjust start based on page
                        'num' => 300 // Number of results to fetch per request
                    ]
                ]);
    
                // Decode the JSON response
                $data = json_decode($response->getBody()->getContents(), true);
    
                // Merge fetched articles with existing ones
                if (isset($data['articles']) && !empty($data['articles'])) {
                    $publications = array_merge($publications, $data['articles']);
                    $page++; // Increment page number to fetch the next set
                } else {
                    $hasMore = false; // No more articles available
                }
            }
    
            return ['articles' => $publications]; // Return all fetched publications
        } catch (\Exception $e) {
            Log::error('Failed to fetch Google Scholar publications: ' . $e->getMessage());
            return null;
        }
    }
    
}
