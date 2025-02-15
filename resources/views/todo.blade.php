@extends('layouts.app')

@section('title', 'Todo List')

@section('content')
<div class="container">
    <h1>Todo List</h1>

    <!-- Form thêm công việc -->
    <form action="{{ route('todos.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="task_name" class="form-control" placeholder="Nhập công việc" required>
            <input type="text" name="note" class="form-control" placeholder="Ghi chú">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>


    <!-- Hiển thị danh sách công việc -->
    <table class="table border border-primary border-3" style="background-color: white;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Công việc</th>
                <th>Ghi chú</th>
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
                        <button type="button" class="btn btn-warning btn-sm" onclick="editTask({{ $todo->id }})">
                            <i class="fas fa-edit"></i> Edit
                        </button>

                        <!-- Form xóa -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-check"></i> Done
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function editTask(id) {
    const taskName = document.getElementById('task-name-' + id).innerText;
    const note = document.getElementById('note-' + id).innerText;

    const taskNameInput = `<input type="text" name="task_name" value="${taskName}" class="form-control" required>`;
    const noteInput = `<input type="text" name="note" value="${note}" class="form-control">`;

    document.getElementById('task-name-' + id).innerHTML = taskNameInput;
    document.getElementById('note-' + id).innerHTML = noteInput;

    const saveButton = `<button class="btn btn-success btn-sm" onclick="saveTask(${id})">Save</button>`;
    document.getElementById('todo-' + id).querySelector('td:last-child').innerHTML = saveButton;
}

function saveTask(id) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/todos/${id}`;

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
    taskName.value = document.querySelector(`#todo-${id} input[name="task_name"]`).value;
    form.appendChild(taskName);

    const note = document.createElement('input');
    note.type = 'hidden';
    note.name = 'note';
    note.value = document.querySelector(`#todo-${id} input[name="note"]`).value;
    form.appendChild(note);

    document.body.appendChild(form);
    form.submit();
}

</script>
@endsection
