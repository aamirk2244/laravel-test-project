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


    <script>
            $(document).ready(function() {

            $('#createTaskBtn').on('click', function() {
            console.log("button is clicked")
            window.location.href = '{{ route("tasks.new") }}';

        });

});

    </script>
    <title>Task List</title>
</head>

<body>
    @php 
        $current_user = auth()->user() 
    @endphp
    
    <h1 class="text-center mt-5"> Hello {{$current_user->name}}</h1>

    <div class="action-buttons mt-5"> 
   
     @if($current_user->role == "Admin")
     <button type="button" id="createTaskBtn" class="btn btn-primary">Create New Task</button>
    @endif

    @if ($tasks->isEmpty()) 
    <div> No tasks available  </div>
    @else 
        <h2>Tasks</h2>
    @endif

    <form action="{{ route('logout') }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

</div>

    <div class="tasks">
        <div class="task-cards">
       
        @foreach($tasks as $task)
        <div class="card m-2" style="width: 25rem;">
            <div class="card-body">
              <div class="card-text">
                <strong>Id:</strong> {{ $task->id }}<br>
                    
                <strong>Title:</strong> {{ $task->title }}<br>
                <strong>Description:</strong> {{ $task->description }}<br>
                <strong>Status:</strong> {{ $task->status }}
                <br>
                <a href="{{ route('feedbacks', ['task_id' => $task->id]) }}" class="btn btn-warning">Feedbacks</a>
             
                @if($current_user->role == "Manager" || $current_user->role == "Admin")
                 <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-warning">Edit</a>
                @endif

                @if($current_user->role == "Admin")
                <form action="{{ route('tasks', ['id' => $task->id]) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                </form>
                @endif
          

              </div>
            </div>
          </div>

          

          @endforeach
        </div>

        
      </div>

</body>

</html>
