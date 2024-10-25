<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Startups</h1>

        @if ($startups->isEmpty())
            <p>No startups available.</p>
        @else
            <ul>
                @foreach ($startups as $startup)
                    <li class="border p-4 mb-2">
                        <h2 class="text-xl font-semibold">{{ $startup->submenu->name }}</h2>
                        <p><strong>Vision:</strong> {{ $startup->vision }}</p>
                        <p><strong>Mission:</strong> {{ $startup->mission }}</p>
                        <p><strong>About:</strong> {{ $startup->about }}</p>
                        <img src="{{ $startup->logo ? asset('storage/' . $startup->logo) : '' }}" alt="Logo" class="mt-2" style="max-width: 100px;">
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    
</body>
</html>
