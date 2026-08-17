<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageFeaturedProperty;
use App\Models\Project;
use App\Http\Requests\Admin\HomePageFeaturedPropertyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageFeaturedPropertyController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $featured = HomePageFeaturedProperty::with(['project', 'unit'])
            ->orderBy('sort_order')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.home-page-details.featured.index', compact('featured', 'perPage'));
    }

    public function create()
    {
        $projects = Project::where('status', true)->orderBy('name')->get();
        $units = \App\Models\Unit::where('status', true)->orderBy('name')->get();

        return view('admin.home-page-details.featured.create', compact('projects', 'units'));
    }

    public function store(HomePageFeaturedPropertyRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        if ($request->hasFile('display_image')) {
            $validated['display_image'] = $this->uploadImage($request->file('display_image'));
        }

        HomePageFeaturedProperty::create($validated);

        return redirect()->route('admin.home-page-featured.index')->with('success', 'Featured Property added successfully.');
    }

    public function show(HomePageFeaturedProperty $homePageFeatured)
    {
        return redirect()->route('admin.home-page-featured.edit', $homePageFeatured);
    }

    public function edit(HomePageFeaturedProperty $homePageFeatured)
    {
        $projects = Project::where('status', true)->orderBy('name')->get();
        $units = \App\Models\Unit::where('status', true)->orderBy('name')->get();

        return view('admin.home-page-details.featured.edit', compact('homePageFeatured', 'projects', 'units'));
    }

    public function update(HomePageFeaturedPropertyRequest $request, HomePageFeaturedProperty $homePageFeatured)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        if ($request->hasFile('display_image')) {
            $this->deleteImage($homePageFeatured->display_image);
            $validated['display_image'] = $this->uploadImage($request->file('display_image'));
        }

        $homePageFeatured->update($validated);

        return redirect()->route('admin.home-page-featured.index')->with('success', 'Featured Property updated successfully.');
    }

    public function destroy(HomePageFeaturedProperty $homePageFeatured)
    {
        $this->deleteImage($homePageFeatured->display_image);
        $homePageFeatured->delete();

        return redirect()->route('admin.home-page-featured.index')->with('success', 'Featured Property deleted successfully.');
    }

    private function uploadImage($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('home-page/featured', $filename, 'public');
    }

    private function deleteImage(?string $path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
