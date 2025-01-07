<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todo', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string|max:255']);
        Todo::create($request->all());
        return redirect()->route('todo')->with('success', 'Thêm việc cần làm thành công!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit-todo', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['task' => 'required|string|max:255']);
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return redirect()->route('todo')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todo')->with('success', 'Xóa thành công!');
    }
}

