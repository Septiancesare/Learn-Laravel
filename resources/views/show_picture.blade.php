<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <p>File: {{ $picture->name }}</p>
    <p>Path: {{ $picture->path }}</p>
    <img src="{{ $url }}" alt="" height='200pc'>
    <form action="{{ route('picture.delete', $picture) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>

    <form action="{{ route('picture.copy', $picture)}}" method="get">
        <button type="submit">Copy Picture</button>
    </form>
    <form action="{{ route('picture.move', $picture)}}" method="get">
        <button type="submit">Move Picture</button>
    </form>
</body>
</html>