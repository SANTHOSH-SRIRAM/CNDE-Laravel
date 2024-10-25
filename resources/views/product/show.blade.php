@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <!-- Display the Submenu name -->
    <h1 class="text-2xl font-bold">{{ $product->submenu->name }}</h1>

    <!-- Check if the product has any methods (stored as JSON array) -->
    @if (!empty($product->products) && is_array($product->products))
        <h3 class="text-lg font-medium mt-2">Product Methods:</h3>
        <ul class="list-disc pl-5 mt-1">
            @foreach($product->products as $productMethod)
                <li>{{ $productMethod['name'] ?? 'Unnamed Method' }}</li>
            @endforeach
        </ul>
    @else
        <p>No methods available for this product.</p>
    @endif

    <!-- Additional Product Information -->
    <div class="mt-4">
        <p class="text-gray-600">Related Menu: <strong>{{ $product->menu->name }}</strong></p>
        <p class="text-gray-600">Related Submenu: <strong>{{ $product->submenu->name }}</strong></p>
    </div>
</div>
@endsection
