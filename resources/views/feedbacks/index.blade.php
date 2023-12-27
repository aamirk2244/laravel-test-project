<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/tasks-index.css') }}">
   
    <title>Feedback List</title>
</head>

<body>
    <div style="display: flex; justify-content: center; margin-top: 2% ">    <a href="{{ route('feedbacks.new', ['task_id' => $task_id]) }}" class="btn btn-warning">Add Feedback</a>
    </div>
    <div class="tasks">
        <div class="task-cards">
       
        @foreach($feedbacks as $feedback)
        <div class="card m-2" style="width: 25rem;">
            <div class="card-body">
              <div class="card-text">
                <strong>Description</strong> {{ $feedback->description }}<br>
            </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</body>
</html>
