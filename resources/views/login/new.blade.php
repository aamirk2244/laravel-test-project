<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

    @if(session('status'))
        {{session('status')}}
    @endif
    <form action="/signin" method="post">
        @csrf
        <label for="username">Email:</label>
        
        <input type="text" id="username" name="email" required>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    

        <button type="submit">Sign In</button>
    </form>
</body>

</html>
