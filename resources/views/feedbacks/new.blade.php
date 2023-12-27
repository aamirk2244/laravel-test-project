<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

    <form action="/feedbacks" method="post">
        @csrf
        <label for="username">Description:</label>
        
        <input type="text" id="feedback" name="description" required>
        <input type="hidden" name="task_id" value="{{ $task_id }}" />


        <button type="submit">Add</button>
    </form>
</body>

</html>
