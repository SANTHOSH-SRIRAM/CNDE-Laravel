@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $researches->submenu->name])

<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-5">Funded Research List</h1>

    <!-- Table to display funded research entries -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">Menu</th>
                <th class="py-2 px-4 border-b">Submenu</th>
                <th class="py-2 px-4 border-b">Period</th>
                <th class="py-2 px-4 border-b">Agency</th>
                <th class="py-2 px-4 border-b">Topic</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">{{ $researches->menu->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $researches->submenu->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">
                        {{ $researches->from_year ? $researches->from_year : 'N/A' }} - 
                        {{ $researches->to_year ? $researches->to_year : 'N/A' }}
                    </td>
                    <td class="py-2 px-4 border-b">{{ $researches->agency ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $researches->topic ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $researches->status ?? 'N/A' }}</td>
                </tr>
        </tbody>
    </table>

    <!-- Add pagination if required -->

</div>
@endsection
