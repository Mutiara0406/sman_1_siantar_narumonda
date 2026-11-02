<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the profiles.
     */
    public function index()
    {
        $profiles = Profile::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new profile.
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created profile in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image_path') ? $request->file('image_path')->store('profiles', 'public') : null;

        Profile::create([
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imagePath,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified profile.
     */
    public function show(Profile $profile)
    {
        return view('admin.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified profile.
     */
    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified profile in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'category' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('profiles', 'public');
            $profile->update(['image_path' => $imagePath]);
        }

        $profile->update($request->only(['category', 'title', 'content']));

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}