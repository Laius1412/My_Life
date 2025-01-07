@extends('layouts.app')

@section('title', 'To-Do List')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">To-Do List</h1>
    <form action="{{ route('todo.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="task" class="form-control" placeholder="Nhập việc cần làm">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Việc cần làm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $todo->task }}</td>
                    <td>
                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
