<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController
{
    public function index()
    {
        return view('contact'); 
    }

    public function create()
    {
        return response()->json(['message' => 'Mostrar formulario de creación de contacto']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'publish_date' => 'required|date',
            'full_name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|string|max:20',
            'comment' => 'required|string|max:250',
            'archived' => 'required|in:archived,notArchived',
        ]);

        $contact = Contact::create($validatedData);

        return response()->json($contact, 201);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json([
            'message' => 'Mostrar formulario de edición de contacto',
            'contact' => $contact
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'publish_date' => 'sometimes|date',
            'full_name' => 'sometimes|string|max:50',
            'email' => 'sometimes|email|max:50',
            'phone_number' => 'sometimes|string|max:20',
            'comment' => 'sometimes|string|max:250',
            'archived' => 'sometimes|in:archived,notArchived',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);

        return response()->json($contact);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contacto eliminado correctamente']);
    }
}
