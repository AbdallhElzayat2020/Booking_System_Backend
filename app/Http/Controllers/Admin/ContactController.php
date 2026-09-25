<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('status')) {
            if ($request->staus === 'unread') {
                $query->unread();
            } elseif ($request->status === 'read') {
                $query->read();
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('message', 'like', '%' . $search . '%');
            });
        }

        $contacts = $query->latest()->paginate(10)->withQueryString();

        $stats = [
            'total' => Contact::count(),
            'unread' => Contact::unread()->count(),
            'read' => Contact::read()->count(),
            'today' => Contact::whereDate('created_at', today())->count(),
        ];

        return view('dashboard.contacts.index', compact('contacts', 'stats'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): View
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return view('dashboard.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function toggleRead(Contact $contact)
    {
        $contact->update([
            'is_read' => !$contact->is_read,
        ]);
        $statusMessage = $contact->is_read ? 'Message marked as read.' : 'Message marked as unread.';
        return back()->with('success', $statusMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted successfully.');

    }


}
