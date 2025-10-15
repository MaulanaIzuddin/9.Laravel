<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
</head>
<body style = "font-family : sans-serif">
    <h1>List Author</h1>
    @foreach ($authors as $item)
    <ul>
        <li>{{$item ['name']}} </li>
        <li>{{$item ['photo']}} </li>
        <li>{{$item ['bio']}} </li>
    </ul>

    @endforeach
</body>
</html>