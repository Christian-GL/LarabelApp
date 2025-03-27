<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Muestra la lista de todos los contactos.
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    // Muestra el formulario para crear un nuevo contacto. En un API normalmente no se usa, pero se deja para la estructura.
    public function create()
    {
        return response()->json(['message' => 'Mostrar formulario de creación de contacto']);
    }

    // Almacena un nuevo contacto en la BD.
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

    // Muestra los detalles de un contacto.
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    // Muestra el formulario para editar un contacto existente.
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json([
            'message' => 'Mostrar formulario de edición de contacto',
            'contact' => $contact
        ]);
    }

    // Actualiza los datos de un contacto.
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

    // Elimina un contacto.
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contacto eliminado correctamente']);
    }
}
