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

    <style> 
    form{
            width: 90%;
            margin: auto;
        }
    </style>

    <title>Update Task</title>
</head>

<body>

    <h1 class="text-center mt-2">Update Task</h1>

    <form action="{{ route('tasks', ['id' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $task->title) }}">
            <div class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description"
                value="{{ old('description', $task->description) }}">
            <div class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status" aria-label="Default select example">
                <option value="To Do" {{ old('status', $task->status) === 'To Do' ? 'selected' : '' }}>To Do</option>
                <option value="In Progress" {{ old('status', $task->status) === 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>
                <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed
                </option>
            </select>
            <div class="text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>

</body>

</html>
