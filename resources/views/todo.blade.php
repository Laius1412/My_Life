@extends('layouts.app')

@section('title', 'Todo List')

@section('content')
<div class="container">
    <h1>Todo List</h1>

    <!-- Form thêm công việc -->
    <form action="{{ route('todos.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="task_name" class="form-control" placeholder="Enter task" required>
            <input type="text" name="note" class="form-control" placeholder="Enter note">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    </form>


    <!-- Hiển thị danh sách công việc -->
    <table class="table border border-dark">
        <thead>
            <tr>
                <th>STT</th>
                <th>Task Name</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr id="todo-{{ $todo->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td id="task-name-{{ $todo->id }}">{{ $todo->task_name }}</td>
                    <td id="note-{{ $todo->id }}">{{ $todo->note }}</td>
                    <td>
                        <!-- Nút sửa -->
                        <button type="button" class="btn btn-warning btn-sm" onclick="editTask({{ $todo->id }})">Edit</button>

                        <!-- Form xóa -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function editTask(id) {
    // Lấy giá trị hiện tại từ bảng
    const taskName = document.getElementById('task-name-' + id).innerText;
    const note = document.getElementById('note-' + id).innerText;

    // Tạo form chỉnh sửa
    const taskNameInput = `<input type="text" name="task_name" value="${taskName}" class="form-control" required>`;
    const noteInput = `<input type="text" name="note" value="${note}" class="form-control">`;

    // Chèn form vào bảng
    document.getElementById('task-name-' + id).innerHTML = taskNameInput;
    document.getElementById('note-' + id).innerHTML = noteInput;

    // Thêm nút lưu
    const saveButton = `<button class="btn btn-success btn-sm" onclick="saveTask(${id})">Save</button>`;
    document.getElementById('todo-' + id).querySelector('td:last-child').innerHTML = saveButton;
}

function saveTask(id) {
    // Gửi form cập nhật
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/todos/' + id;

    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);

    const method = document.createElement('input');
    method.type = 'hidden';
    method.name = '_method';
    method.value = 'PUT';
    form.appendChild(method);

    const taskName = document.createElement('input');
    taskName.type = 'hidden';
    taskName.name = 'task_name';
    taskName.value = document.querySelector(`[name="task_name"]`).value;
    form.appendChild(taskName);

    const note = document.createElement('input');
    note.type = 'hidden';
    note.name = 'note';
    note.value = document.querySelector(`[name="note"]`).value;
    form.appendChild(note);

    document.body.appendChild(form);
    form.submit();
}
</script>
@endsection
