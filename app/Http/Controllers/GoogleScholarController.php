<?php

namespace App\Http\Controllers;

use App\Models\Publications;
use App\Services\GoogleScholarServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GoogleScholarController extends Controller
{
    protected $googleScholarService;

    public function __construct(GoogleScholarServices $googleScholarService)
    {
        $this->googleScholarService = $googleScholarService;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $publications = Publications::paginate($perPage);  // Initial pagination

        // Check if author_id is provided to fetch data from Google Scholar
        if ($request->has('author_id')) {
            $authorId = $request->input('author_id');
            $publicationsFromGoogle = $this->googleScholarService->getPublications($authorId);

            if ($publicationsFromGoogle && isset($publicationsFromGoogle['articles'])) {
                foreach ($publicationsFromGoogle['articles'] as $publication) {
                    Log::info('Fetched publication:', $publication);

                    // Handling citation count
                    $citationCount = $publication['cited_by']['value'] ?? 0;

                    // Ensure citation count is valid
                    if (!is_numeric($citationCount)) {
                        Log::warning('Non-numeric citation count found:', ['value' => $citationCount]);
                        $citationCount = 0;  // Defaulting to 0 if invalid
                    }

                    // Save or update the publication in the database
                    Publications::updateOrCreate(
                        ['title' => $publication['title']],
                        [
                            'citation_count' => $citationCount,
                            'publication_year' => isset($publication['year']) && is_numeric($publication['year']) && 
                                                  ($publication['year'] >= 1900 && $publication['year'] <= 2155)
                                                  ? $publication['year']
                                                  : null,  // Assign null if the year is out of range
                            'author_name' => is_array($publication['authors']) 
                                             ? implode(', ', $publication['authors']) 
                                             : $publication['authors'] ?? null,
                        ]
                    );
                    
                    
                }

                // Refetch updated publications to reflect in the view
                $publications = Publications::paginate($perPage);
            } else {
                Log::warning('No publications found for the author_id: ' . $authorId);
            }
        }

        return view('publications.index', compact('publications', 'perPage'));
    }
}
