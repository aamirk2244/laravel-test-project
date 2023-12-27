import './bootstrap';

document.getElementById('createTaskBtn').addEventListener('click', function() {
    console.log("button is clicked")
    window.location.href = '{{ route("tasks.new") }}';

});

