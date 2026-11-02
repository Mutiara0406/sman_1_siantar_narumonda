<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index()
    {
        $contacts = Contact::orderBy('sort_order')->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:100',
            'value' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Show the specified contact.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:100',
            'value' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    public function indexGuest()
    {
        $contacts = Contact::where('status', 'active')
                            ->orderBy('sort_order')
                            ->get();

        return view('guest.contacts', compact('contacts'));
    }
}