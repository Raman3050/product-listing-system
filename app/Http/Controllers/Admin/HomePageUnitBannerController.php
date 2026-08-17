<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageUnitBanner;
use App\Models\Project;
use App\Http\Requests\Admin\HomePageUnitBannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageUnitBannerController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $banners = HomePageUnitBanner::with(['project', 'unit'])
            ->orderBy('sort_order')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.home-page-details.banners.index', compact('banners', 'perPage'));
    }

    public function create()
    {
        $projects = Project::where('status', true)->orderBy('name')->get();
        $units = \App\Models\Unit::where('status', true)->orderBy('name')->get();

        return view('admin.home-page-details.banners.create', compact('projects', 'units'));
    }

    public function store(HomePageUnitBannerRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $this->uploadImage($request->file('background_image'));
        }

        HomePageUnitBanner::create($validated);

        return redirect()->route('admin.home-page-banners.index')->with('success', 'Banner created successfully.');
    }

    public function show(HomePageUnitBanner $homePageBanner)
    {
        return redirect()->route('admin.home-page-banners.edit', $homePageBanner);
    }

    public function edit(HomePageUnitBanner $homePageBanner)
    {
        $projects = Project::where('status', true)->orderBy('name')->get();
        // Load all units for JS filtering
        $units = \App\Models\Unit::where('status', true)->orderBy('name')->get();

        return view('admin.home-page-details.banners.edit', compact('homePageBanner', 'projects', 'units'));
    }

    public function update(HomePageUnitBannerRequest $request, HomePageUnitBanner $homePageBanner)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        if ($request->hasFile('background_image')) {
            $this->deleteImage($homePageBanner->background_image);
            $validated['background_image'] = $this->uploadImage($request->file('background_image'));
        }

        $homePageBanner->update($validated);

        return redirect()->route('admin.home-page-banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(HomePageUnitBanner $homePageBanner)
    {
        $this->deleteImage($homePageBanner->background_image);
        $homePageBanner->delete();

        return redirect()->route('admin.home-page-banners.index')->with('success', 'Banner deleted successfully.');
    }

    private function uploadImage($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('home-page/banners', $filename, 'public');
    }

    private function deleteImage(?string $path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
