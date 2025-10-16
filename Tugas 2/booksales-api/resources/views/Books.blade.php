<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h1>List Books</h1>
    @foreach ($books as $books)
    <ul>
        <li>{{$books ['title']}} </li>
        <li>{{$books ['description']}} </li>
        <li>{{$books ['price']}} </li>
        <li>{{$books ['stok']}} </li>
        <li>{{$books ['cover_photo']}} </li>
        <li>{{$books ['genre_id']}} </li>
        <li>{{$books ['author_id']}} </li>
    </ul>

    @endforeach
</body>
</html>