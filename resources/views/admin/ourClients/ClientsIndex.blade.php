@extends('admin.layouts.AdminLayout')

@section('content')
<div class="clients-section">
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client Category</a>
    <h1>Our Clients</h1>
    <div class="clients-logos">
        @foreach($clients as $client)
            <div class="client-logo-item">
                <h2>{{ $client->name }}</h2>
                <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" class="w-32 object-fill"/>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
