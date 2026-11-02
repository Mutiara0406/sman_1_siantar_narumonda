<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => auth()->id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery_images', 'public');
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified gallery.
     */
    public function show(Gallery $gallery)
    {
        $images = $gallery->images;
        return view('admin.galleries.show', compact('gallery', 'images'));
    }

    /**
     * Show the form for editing the specified gallery.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery_images', 'public');
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->images()->delete();
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }
    
    public function indexGuest()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10);
        return view('guest.galleries.index', compact('galleries'));
    }

    public function showGuest(Gallery $gallery)
    {
        $images = $gallery->images;
        return view('guest.galleries.show', compact('gallery', 'images'));
    }
}