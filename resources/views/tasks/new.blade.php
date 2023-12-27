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

    <title>Task List</title>
</head>

<body>

    <h1 class="text-center mt-2">Create New Task</h1>
   
    <form action="{{ route('tasks') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="" value={{old('title')}}>
            <div class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="" value={{old('description')}}>
            <div class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Select Status</option>
                <option value="To Do">To Do</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            <div class="text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>
