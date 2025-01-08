<?php

namespace App\Http\Controllers;

use App\Models\Todo; // Thêm dòng này để sử dụng model Todo
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Hiển thị danh sách todo
    public function index()
{
    $todos = Todo::all(); // Lấy tất cả công việc
    return view('todo', compact('todos')); // Trả lại view với dữ liệu mới
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
    // Kiểm tra và xác thực dữ liệu
    $request->validate([
        'task_name' => 'required|string|max:255',
        'note' => 'nullable|string',
    ]);

    // Tìm công việc cần cập nhật
    $todo = Todo::findOrFail($id);

    // Cập nhật thông tin công việc
    $todo->update([
        'task_name' => $request->input('task_name'),
        'note' => $request->input('note'),
    ]);

    // Quay lại trang Todo và thông báo thành công
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
