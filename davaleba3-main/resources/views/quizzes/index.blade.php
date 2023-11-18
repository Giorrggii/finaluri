<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
</head>
<body>
    <h1>Quizzes</h1>
    
    <ul>
        @foreach($quizzes as $quiz)
            <li>
                <strong>{{ $quiz->question }}</strong><br>
                სათაური: {{ $quiz->option1 }}<br>
                აღწერა: {{ $quiz->option2 }}<br>
                ფოტო: {{ $quiz->option3 }}<br>
                სტატუსი: {{ $quiz->option4 }}<br>
            </li>
        @endforeach
    </ul>
</body>
</html>
