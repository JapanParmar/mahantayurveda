<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhilosophyCard;
use Illuminate\Http\Request;

class PhilosophyCardController extends Controller
{
    public function index()
    {
        $cards = PhilosophyCard::orderBy('order')->get();
        return view('admin.philosophy.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.philosophy.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        PhilosophyCard::create($validated);

        return redirect()->route('admin.philosophy.index')->with('success', 'Philosophy card created successfully!');
    }

    public function edit(PhilosophyCard $philosophy)
    {
        return view('admin.philosophy.edit', ['card' => $philosophy]);
    }

    public function update(Request $request, PhilosophyCard $philosophy)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $philosophy->update($validated);

        return redirect()->route('admin.philosophy.index')->with('success', 'Philosophy card updated successfully!');
    }

    public function destroy(PhilosophyCard $philosophy)
    {
        $philosophy->delete();

        return redirect()->route('admin.philosophy.index')->with('success', 'Philosophy card deleted successfully!');
    }
}
