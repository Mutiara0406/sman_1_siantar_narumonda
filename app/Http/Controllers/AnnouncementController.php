<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the announcements.
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created announcement in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $filePath = $request->file('file_path') ? $request->file('file_path')->store('announcements') : null;

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $filePath,
            'status' => 'active',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified announcement.
     */
    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified announcement in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Update file if new file is uploaded
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('announcements');
            $announcement->update(['file_path' => $filePath]);
        }

        // Update other fields
        $announcement->update($request->only(['title', 'content', 'status', 'start_date', 'end_date']));

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified announcement from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }

    public function indexGuest()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);
        return view('guest.announcements', compact('announcements'));
    }
}   