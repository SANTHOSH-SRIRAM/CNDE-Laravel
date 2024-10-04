@extends('layouts.app')

@section('content')
    <h1>Submenus</h1>

    <a href="{{ route('submenus.create') }}" class="btn btn-primary">Create New Submenu</a>

    <table class="table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Subparent Name</th>
                <th>Submenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                @foreach($menu->submenus as $submenu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $submenu->subparent_name }}</td>
                        <td>{{ $submenu->name }}</td>
                        <td>
                            <a href="{{ route('submenus.edit', $submenu->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('submenus.destroy', $submenu->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
