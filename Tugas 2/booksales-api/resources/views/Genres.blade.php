<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body style = "font-family : sans-serif">
    <h1>List Genre</h1>
    @foreach ($genres as $genres)
    <ul>
        <li>{{$genres ['name']}} </li>
        <li>{{$genres ['description']}} </li>
    </ul>

    @endforeach
</body>
</html>