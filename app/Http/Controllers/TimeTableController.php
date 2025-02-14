<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index()
    {
        $timetable = TimeTable::all()->keyBy('day_of_week');
        return view('time-table', compact('timetable'));
    }

    public function store(Request $request)
    {
        foreach ($request->timetable as $day => $schedule) {
            TimeTable::updateOrCreate(
                ['day_of_week' => $day],
                [
                    'morning' => $schedule['morning'],
                    'afternoon' => $schedule['afternoon'],
                    'evening' => $schedule['evening']
                ]
            );
        }

        return redirect()->route('time-table')->with('success', 'Time table updated successfully!');
    }
}
