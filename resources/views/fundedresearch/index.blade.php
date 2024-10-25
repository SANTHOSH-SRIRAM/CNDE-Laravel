@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-5">Funded Research List</h1>

    <!-- Table to display funded research entries -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">Menu</th>
                <th class="py-2 px-4 border-b">Submenu</th>
                <th class="py-2 px-4 border-b">Period</th>
                <th class="py-2 px-4 border-b">Agency</th>
                <th class="py-2 px-4 border-b">Topic</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($researches as $index => $research)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->menu->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->submenu->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->from_year }} - {{ $research->to_year }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->agency }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->topic }}</td>
                    <td class="py-2 px-4 border-b">{{ $research->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add pagination if required -->
    <div class="mt-5">
        {{ $researches->links() }} <!-- Assuming you're paginating the results -->
    </div>
</div>
@endsection
