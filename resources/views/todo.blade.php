@extends('layouts.app')

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
                <th>#</th>
                <th>Task Name</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $todo->task_name }}</td>
                    <td>{{ $todo->note }}</td>
                    <td>
                        <!-- Nút sửa -->
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>

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
@endsection
