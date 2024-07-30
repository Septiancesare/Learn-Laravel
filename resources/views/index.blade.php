<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
</head>
<body>

@if (Auth::check())
<form action="{{route('logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
<p>Name : {{ $user->name }}</p>
<p>Email : {{ $user->email }}</p>
<p>ID: {{$id}}</p>
@else
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
@endif

<table border='1px'>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Nilai</th>
        <th>Actions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>
            {{ $student-> id }}
        </td>
        <td>
            <a href="{{ route ('show', $student->id )}}"> {{ $student-> name}} </a>
        </td>
        <td>
            {{ $student->score }}
        </td>
        <td>
            <form action="{{ route('edit', $student) }}" method="get">
                @csrf
                <button type="submit">
                    Edit
                </button>
            </form>
            <form action="{{ route('delete', $student) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    Current page: {{ $students -> currentPage() }} <br>
    Total data: {{ $students -> total() }} <br>
    Data per Page: {{ $students -> perPage() }} <br>

    {{ $students -> links('pagination::bootstrap-4') }}

</body>
</html>