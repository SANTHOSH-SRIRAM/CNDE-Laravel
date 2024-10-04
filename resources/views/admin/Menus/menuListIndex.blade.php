@extends('layouts.app')

@section('content')
    <h1>Menus</h1>

    <a href="{{ route('menus.create') }}" class="btn btn-primary">Create New Menu</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Submenus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>
                        <ul>
                            @foreach($menu->submenus as $submenu)
                                <li>
                                    {{ $submenu->name }}

                                    <!-- Display subparent menus if they exist -->
                                    @if($submenu->subparent_name)
                                        <ul>
                                            <li>Subparent: {{ $submenu->subparent_name }}</li>
                                            <!-- You can nest this further if you have more hierarchy levels -->
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
