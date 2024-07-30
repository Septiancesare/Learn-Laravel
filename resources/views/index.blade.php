<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
</head>
<body>
    <h1>{{ __('welcome to this page') }}</h1>
    <p>Locale: {{App::getLocale()}}</p>
    <a href="{{ 'set_locale', 'en'}}">English</a>
    <a href="{{ 'set_locale', 'id'}}">Indonesia</a>

    @if (Auth::check())
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">{{ __('Logout') }}</button>
    </form>
    <p>{{ __('Name') }} : {{ $user->name }}</p>
    <p>{{ __('Role') }}: {{ $user->role }}</p>
    <p>{{ __('Email') }} : {{ $user->email }}</p>
    <p>ID: {{$id}}</p>
    @else
        <a href="{{route('login')}}">{{ __('Login') }}</a>
        <a href="{{route('register')}}">{{ __('Register')}}</a>
    @endif

    <table border='1px'>
        <tr>
            <th>ID</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Grade') }}</th>
            <th>{{ __('Actions')}}</th>
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
                        {{ __('Edit') }}
                    </button>
                </form>
                <form action="{{ route('delete', $student) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">
                        {{ __('Delete') }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ __('Current page' )}}: {{ $students -> currentPage() }} <br>
    {{ __('Total data') }}: {{ $students -> total() }} <br>
    {{ __('Data per Page') }}: {{ $students -> perPage() }} <br>

    {{ $students -> links('pagination::bootstrap-4') }}

</body>
</html>