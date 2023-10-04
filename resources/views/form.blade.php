<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reservation Form</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <h1> Reservation Form</h1>
        <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
            @csrf
            <input type="text" name="name" placeholder="Name" required/>
            <input type="text" name="phone_number" placeholder="Phone" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="date" name="date" placeholder="Date" required/>
            <input type="time" name="time" placeholder="Time" required/>
            <input type="number" name="guests" placeholder="Guests" required/>
            <textarea type="message" name="message" placeholder="Message"></textarea>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
