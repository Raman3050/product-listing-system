<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageProjectLogo;
use App\Models\Builder;
use App\Http\Requests\Admin\HomePageProjectLogoRequest;
use Illuminate\Http\Request;

class HomePageProjectLogoController extends Controller
{
    public function index()
    {
        $builders = Builder::where('status', true)->orderBy('name')->get();
        $selectedBuilderIds = HomePageProjectLogo::pluck('builder_id')->toArray();

        return view('admin.home-page-details.logos.index', compact('builders', 'selectedBuilderIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'builders' => 'nullable|array',
            'builders.*' => 'exists:builders,id'
        ]);

        $selectedBuilders = $request->input('builders', []);

        // Remove builders that are no longer selected
        HomePageProjectLogo::whereNotIn('builder_id', $selectedBuilders)->delete();

        // Get currently saved builders
        $existingBuilderIds = HomePageProjectLogo::pluck('builder_id')->toArray();

        // Add new selections
        $newBuilders = array_diff($selectedBuilders, $existingBuilderIds);

        foreach ($newBuilders as $builderId) {
            HomePageProjectLogo::create([
                'builder_id' => $builderId,
                'status' => true,
                'sort_order' => 0
            ]);
        }

        return redirect()->route('admin.home-page-logos.index')->with('success', 'Project Logos updated successfully.');
    }
}
