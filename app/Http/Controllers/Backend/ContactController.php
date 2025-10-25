<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('backend.pages.contact.index', [
            'contacts' => Contact::all()
        ]);
    }
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.pages.contact.edit', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('allContactMessages')->with('msg', 'Contact message deleted successfully');
    }
}
