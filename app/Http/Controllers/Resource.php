<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class Resource
{
    public function index()
    {
        $activities = Activity::all();
        return view('activities.view', compact('activities'));
    }

    public function create()
    {
        return view('activities.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:surf,windsurf,kayak,atv,hot air balloon',
            'user_id' => 'required|exists:users,id',
            'datetime' => 'required|date',
            'notes' => 'nullable|string',
            'satisfaction' => 'nullable|integer|min:0|max:10',
        ]);

        $validated['paid'] = $request->has('paid');
        $activity = Activity::create($validated);

        return response()->json($activity, 201);
    }

    public function show(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.view', compact('activity'));
    }

    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.form', compact('activity'));
    }

    public function update(Request $request, string $id)
    {
        $activity = Activity::findOrFail($id);

        $validated = $request->validate([
            'type' => 'required|in:surf,windsurf,kayak,atv,hot air balloon',
            'user_id' => 'required|exists:users,id',
            'datetime' => 'required|date',
            'paid' => 'boolean',
            'notes' => 'nullable|string',
            'satisfaction' => 'nullable|integer|min:0|max:10',
        ]);

        $activity->update($validated);

        return response()->json($activity);
    }

    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return response()->json(null, 204);
    }
}
