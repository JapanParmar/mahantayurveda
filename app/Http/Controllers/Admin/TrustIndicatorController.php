<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrustIndicator;
use Illuminate\Http\Request;

class TrustIndicatorController extends Controller
{
    public function index()
    {
        $indicators = TrustIndicator::orderBy('order')->get();
        return view('admin.trust-indicators.index', compact('indicators'));
    }

    public function create()
    {
        return view('admin.trust-indicators.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'text' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        TrustIndicator::create($validated);

        return redirect()->route('admin.trust-indicators.index')->with('success', 'Trust indicator created successfully!');
    }

    public function edit(TrustIndicator $trustIndicator)
    {
        return view('admin.trust-indicators.edit', ['indicator' => $trustIndicator]);
    }

    public function update(Request $request, TrustIndicator $trustIndicator)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'text' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $trustIndicator->update($validated);

        return redirect()->route('admin.trust-indicators.index')->with('success', 'Trust indicator updated successfully!');
    }

    public function destroy(TrustIndicator $trustIndicator)
    {
        $trustIndicator->delete();

        return redirect()->route('admin.trust-indicators.index')->with('success', 'Trust indicator deleted successfully!');
    }
}
