<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Scholar Publications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto p-4">
    @include('layouts.bigHeading', ['submenuName' => 'SCIENTIFIC PUBLICATIONS'])


        <!-- Form to fetch Google Scholar Publications -->
        <form action="{{ route('publications.index') }}" method="GET" class="mb-4">
            <input type="text" name="author_id" placeholder="Enter Author ID" class="border p-2" required>
            <button type="submit" class="bg-blue-500 text-white p-2">Fetch Publications</button>
        </form>

        <!-- Real-time Google Scholar Publications -->
        @if(request()->has('author_id'))
            @if(!empty($publications['articles']))
                <h2 class="text-xl font-semibold mt-4">Google Scholar Results</h2>
                <table class="min-w-full border border-gray-300 mt-4">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Citations</th>
                            <th class="border px-4 py-2">Publication Year</th>
                            <th class="border px-4 py-2">Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publications['articles'] as $publication)
                            <tr>
                                <td class="border px-4 py-2">{{ $publication['title'] }}</td>
                                <td class="border px-4 py-2">
                                    {{ is_array($publication['cited_by']) ? $publication['cited_by']['value'] : $publication['cited_by'] ?? 0 }}
                                </td>
                                <td class="border px-4 py-2">{{ $publication['year'] ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $publication['authors'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No publications found for the provided Author ID.</p>
            @endif
        @endif

        <!-- Publications Stored in Database -->
        <h2 class="text-xl font-semibold mt-8">Publications Stored in Database</h2>
        @if($publications->isNotEmpty())
            <table class="min-w-full border border-gray-300 mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Citations</th>
                        <th class="border px-4 py-2">Publication Year</th>
                        <th class="border px-4 py-2">Author</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publications as $publication)
                        <tr>
                            <td class="border px-4 py-2">{{ $publication->title }}</td>
                            <td class="border px-4 py-2">{{ $publication->citation_count ?? 0 }}</td>
                            <td class="border px-4 py-2">{{ $publication->publication_year ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $publication->author_name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $publications->appends(['per_page' => $perPage])->links() }}
            </div>
        @else
            <p>No publications stored in the database.</p>
        @endif
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Scholar Publications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head> -->
<body>
    <!-- <div class="container mx-auto p-4"> -->
        <!-- <h1 class="text-2xl font-bold mb-4">Google Scholar Publications</h1> -->

       
<!-- 
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Citations</th>
                    <th class="border px-4 py-2">Publication Year</th>
                    <th class="border px-4 py-2">Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $publication)
                    <tr>
                        <td class="border px-4 py-2">{{ $publication->title }}</td>
                        <td class="border px-4 py-2">{{ $publication->citation_count ?? 0 }}</td>
                        <td class="border px-4 py-2">{{ $publication->publication_year ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $publication->author_name ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> -->


        <!-- <div class="mt-4"> -->
        <!-- <form action="{{ route('publications.index') }}" method="GET" class="mb-4">
            <label for="per_page" class="mr-2">Show:</label>
            <select name="per_page" id="per_page" class="border p-2" onchange="this.form.submit()">
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
            </select>
        </form> -->
            <!-- {{ $publications->appends(['per_page' => $perPage])->links() }}  Append per_page to pagination links -->
        <!-- </div> -->
    <!-- </div> -->
</body>
</html>



