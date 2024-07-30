<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <style>
        .greet{
            width: 100vw;
            height: 100vh;
            justify-content:center;
        }
    </style>
</head>
<body>
    <div class="greet">
        
        <h1>{{ $student->name }}</h1>
        <p>Student Id: {{$student->id}}</p>
        <p>Student Score: {{ $student->score}}</p>
        <h3>Student Activities:</h3>
        @foreach ($student->activities as $activity)
            <p>{{ $activity->name }}</p>
        @endforeach
    </div>
</body>
</html>