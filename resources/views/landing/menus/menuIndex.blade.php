@foreach($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        <p>Quantity: {{ $product->quantity }}</p>
    </div>
@endforeach
