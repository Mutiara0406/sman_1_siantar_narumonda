<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Profile;
use App\Models\Contact;

class GuestController extends Controller
{
    public function index()
    {
        // Ambil data pengumuman, profil, dan kontak
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);
        $profiles = Profile::orderBy('created_at', 'desc')->get();
        $contacts = Contact::where('status', 'active')->orderBy('sort_order')->get();

        // Kirimkan ketiga data ke view
        return view('guest.index', compact('announcements', 'profiles', 'contacts'));
    }
}