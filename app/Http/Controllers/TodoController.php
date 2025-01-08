<?php

namespace App\Http\Controllers;

use App\Models\Todo; // Thêm dòng này để sử dụng model Todo
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Hiển thị danh sách todo
    public function index()
    {
        $todos = Todo::all(); // Lấy tất cả các công việc
        return view('todo', compact('todos'));
    }

    // Thêm todo mới
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        Todo::create($request->all()); // Lưu công việc mới
        return redirect()->route('todo')->with('success', 'Task added successfully!');
    }

    // Hiển thị form sửa todo
    public function edit($id)
    {
        $todo = Todo::findOrFail($id); // Tìm todo theo ID
        return view('todo.edit', compact('todo'));
    }

    // Cập nhật todo
    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $todo = Todo::findOrFail($id); // Tìm todo theo ID
        $todo->update($request->all()); // Cập nhật thông tin
        return redirect()->route('todo')->with('success', 'Task updated successfully!');
    }

    // Xóa todo
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id); // Tìm todo theo ID
        $todo->delete(); // Xóa công việc
        return redirect()->route('todo')->with('success', 'Task deleted successfully!');
    }
}
