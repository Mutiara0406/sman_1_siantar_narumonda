<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $request->file('image_path')->store('news', 'public');

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'content' => $request->content,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('news.index')->with('success', 'News item created successfully.');
    }

    /**
     * Display the specified news item.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified news item.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('news', 'public');
            $news->update(['image_path' => $imagePath]);
        }

        $news->update($request->only(['title', 'content', 'category_id', 'status', 'published_at']));

        return redirect()->route('news.index')->with('success', 'News item updated successfully.');
    }

    /**
     * Remove the specified news item from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News item deleted successfully.');
    }

    public function indexGuest()
    {
        $news = News::where('status', 'published')
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);

        return view('guest.news', compact('news'));
    }

    public function showGuest($slug)
    {
        $news = News::where('slug', $slug)
                    ->where('status', 'published') 
                    ->firstOrFail();

        return view('guest.news_show', compact('news'));
    }
}