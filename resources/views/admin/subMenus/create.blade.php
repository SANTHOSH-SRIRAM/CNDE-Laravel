@extends('layouts.app')

@section('content')
    <h1>Create New Submenus</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('submenus.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="menu_id">Parent Menu:</label>
            <select name="menu_id" id="menu_id" class="form-control" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="submenus-container">
            <div class="submenu-group">
                <div class="form-group">
                    <label for="subparent_name[]">Subparent Menu:</label>
                    <input type="text" name="subparent_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="submenu[0][]">Submenu:</label>
                    <input type="text" name="submenu[0][]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-secondary add-submenu">Add Submenu</button>
            </div>
        </div>

        <button type="button" id="add-subparent" class="btn btn-secondary">Add Subparent Menu</button>
        <button type="submit" class="btn btn-primary">Create Submenus</button>
    </form>

    <script>
        let subparentIndex = 0;

        document.getElementById('add-subparent').addEventListener('click', function () {
            subparentIndex++;
            const container = document.getElementById('submenus-container');

            const submenuGroup = document.createElement('div');
            submenuGroup.classList.add('submenu-group');

            submenuGroup.innerHTML = `
                <div class="form-group">
                    <label for="subparent_name[]">Subparent Menu:</label>
                    <input type="text" name="subparent_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="submenu[${subparentIndex}][]">Submenu:</label>
                    <input type="text" name="submenu[${subparentIndex}][]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-secondary add-submenu">Add Submenu</button>
            `;

            container.appendChild(submenuGroup);

            // Add event listener to the new Add Submenu button
            submenuGroup.querySelector('.add-submenu').addEventListener('click', function () {
                addSubmenu(submenuGroup, subparentIndex);
            });
        });

        function addSubmenu(group, index) {
            const submenuInput = document.createElement('input');
            submenuInput.type = 'text';
            submenuInput.name = `submenu[${index}][]`;
            submenuInput.classList.add('form-control');
            submenuInput.required = true;

            const button = group.querySelector('.add-submenu');
            button.insertAdjacentElement('beforebegin', submenuInput);
        }

        // Initialize the first Add Submenu button
        document.querySelector('.add-submenu').addEventListener('click', function () {
            addSubmenu(document.querySelector('.submenu-group'), subparentIndex);
        });
    </script>
@endsection
