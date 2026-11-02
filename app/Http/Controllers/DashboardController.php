<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Contact;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil jumlah data dari setiap modul
        $counts = [
            'profiles' => Profile::count(), // Jumlah data profile
            'announcements' => Announcement::count(), // Jumlah pengumuman
            'news' => News::count(), // Jumlah berita
            'galleries' => Gallery::count(), // Jumlah galeri
            'contacts' => Contact::count(), // Jumlah kontak
        ];

        // Kirim data ke view admin.dashboard
        return view('admin.dashboard', compact('counts'));
    }
}
