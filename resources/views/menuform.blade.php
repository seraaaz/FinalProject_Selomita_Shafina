<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Menu Tasty Trails</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <h1> Add Menu</h1>

        @if (isset($menu))
        <form action="{{ route('menus.update', ['menu' => $menu->id]) }}"  enctype="multipart/form-data" method="POST" class="d-flex flex-column gap-3">
            @method('PUT')
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{$menu->name}}" required/>
            <input type="text" name="price" placeholder="Price" value="{{$menu->price}}" required/>
            <input type="text" name="description" placeholder="Description" value="{{$menu->description}}"required/>
            <input type="file" name="image" placeholder="Image" value="{{$menu->image}}"required/>
            <button type="submit">Save Changes</button>
        </form>
        @else
        <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="price" placeholder="Price">
            <input type="text" name="description" placeholder="Description">
            <input type="file" name="image" placeholder="Image">
            <button type="submit">Submit</button>
        </form>
        @endif
    </body>
</html>
