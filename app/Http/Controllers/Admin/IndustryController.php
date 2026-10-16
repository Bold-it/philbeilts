<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('sort_order')->get();
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:120',
            'roman'      => 'required|string|max:10',
            'short'      => 'required|string|max:300',
            'icon'       => 'required|string|max:10',
            'color'      => 'required|string|max:20',
            'sort_order' => 'required|integer|min:0',
            'is_active'  => 'sometimes|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data['slug']      = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('industries', 'public');
        } else {
            unset($data['image']);
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry "' . $data['title'] . '" created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:120',
            'roman'        => 'required|string|max:10',
            'short'        => 'required|string|max:300',
            'icon'         => 'required|string|max:10',
            'color'        => 'required|string|max:20',
            'sort_order'   => 'required|integer|min:0',
            'is_active'    => 'sometimes|boolean',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'remove_image' => 'sometimes|boolean',
        ]);

        $data['slug']      = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', false);

        // Handle image removal
        if ($request->boolean('remove_image') && $industry->image) {
            Storage::disk('public')->delete($industry->image);
            $data['image'] = null;
        }

        // Handle new image upload (replaces existing)
        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }
            $data['image'] = $request->file('image')->store('industries', 'public');
        }

        unset($data['remove_image']);
        $industry->update($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry "' . $industry->title . '" updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        // Delete stored image if present
        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }

        $title = $industry->title;
        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry "' . $title . '" has been deleted.');
    }
}
