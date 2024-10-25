@extends('admin.layouts.AdminLayout')

@section('content')
<h1>Create New Client</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div id="logos-container">
        <div class="logo-group">
            <div class="form-group">
                <label for="logos[]">Client Logo:</label>
                <input type="file" name="logos[]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-secondary add-logo">Add Logo</button>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create Client</button>
</form>

<script>
    document.querySelector('.add-logo').addEventListener('click', function () {
        const container = document.getElementById('logos-container');

        const logoGroup = document.createElement('div');
        logoGroup.classList.add('logo-group');

        logoGroup.innerHTML = `
            <div class="form-group">
                <label for="logos[]">Client Logo:</label>
                <input type="file" name="logos[]" class="form-control" required>
            </div>
        `;

        container.appendChild(logoGroup);
    });
</script>
@endsection
