<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::all();
        return view('diary', compact('diaries'));
    }

    public function store(Request $request)
    {
        $request->validate(['date' => 'required|date', 'content' => 'nullable']);
        Diary::updateOrCreate(['date' => $request->date], ['content' => $request->content]);
        return redirect()->route('diary')->with('success', 'Saved successfully!');
    }

    public function destroy($id)
    {
        Diary::findOrFail($id)->delete();
        return redirect()->route('diary')->with('success', 'Deleted successfully!');
    }
}

