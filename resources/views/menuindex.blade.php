<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1> All Menu </h1>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>

    <div class="container mt-4">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->description }}</td>
                    <!-- Display the image using the <img> tag -->
                    <td><img src="{{ asset('images/' . $menu->image) }}" alt="{{ $menu->name }}" style="max-width: 100px;"></td>
                    <td>
                        <form action="{{ route('menus.edit', $menu->id) }}" method="get">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gWQWSjUnlBA2M2/JM8WQKxOq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-6iRFAkA6NSq4I4lXZ3O8L/nBq4GLDvE6a2DA2DTkt0iurxk5zHkzJT6KE38Xt5ej" crossorigin="anonymous"></script>
</body>
</html>
