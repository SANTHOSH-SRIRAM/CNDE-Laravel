@extends('layouts.app')

@section('content')
    <h1>Create New Menu</h1>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Menu Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="menu_id">Menu Id:</label>
            <input type="text" name="menu_id" id="menu_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Menu</button>
    </form>
@endsection
