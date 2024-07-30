<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Picture</title>
</head>
<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('picture.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="Name"> <br>
        <input type="file" name="file" id="file"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
