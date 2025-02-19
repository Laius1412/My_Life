<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use Cloudinary\Cloudinary;

class AchievementController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary();
    }

    public function index()
    {
        $achievements = Achievement::orderBy('event_date', 'desc')->get();
        return view('achievement', compact('achievements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_date' => 'required|date',
            'event_description' => 'required|string',
            'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $this->cloudinary->uploadApi()->upload($request->file('event_image')->getRealPath());

        Achievement::create([
            'event_date' => $request->event_date,
            'event_description' => $request->event_description,
            'event_image' => $imagePath['secure_url'],
        ]);

        return redirect()->route('achievement')->with('success', 'Thành tích đã được lưu!');
    }

    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievements = Achievement::all();
        return view('achievement', compact('achievement', 'achievements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_date' => 'required|date',
            'event_description' => 'required|string',
            'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $achievement = Achievement::findOrFail($id);
        $achievement->event_date = $request->event_date;
        $achievement->event_description = $request->event_description;

        if ($request->file('event_image')) {
            // Xóa ảnh cũ trên Cloudinary
            $publicId = pathinfo($achievement->event_image, PATHINFO_FILENAME);
            $this->cloudinary->uploadApi()->destroy($publicId);

            // Tải ảnh mới lên Cloudinary
            $imagePath = $this->cloudinary->uploadApi()->upload($request->file('event_image')->getRealPath());
            $achievement->event_image = $imagePath['secure_url'];
        }

        $achievement->save();

        return redirect()->route('achievement')->with('success', 'Thành tích đã được cập nhật!');
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $publicId = pathinfo($achievement->event_image, PATHINFO_FILENAME);
        $this->cloudinary->uploadApi()->destroy($publicId);
        $achievement->delete();

        return redirect()->route('achievement')->with('success', 'Thành tích đã được xóa!');
    }
}
