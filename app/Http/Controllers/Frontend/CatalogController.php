<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Unit;

class CatalogController extends Controller
{
    public function index()
    {
        $projects = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
        ])
        ->where('status', true)
        ->latest()
        ->get();

        return view(
            'frontend.catalog.list',
            compact('projects')
        );
    }

    public function show(string $slug)
    {
        $project = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
            'amenities',
            'units.tenant',
            'units.features',
            'units.images',
        ])
        ->where('slug', $slug)
        ->where('status', true)
        ->firstOrFail();

        return view(
            'frontend.catalog.index',
            compact('project')
        );
    }

    public function unitShow(string $projectSlug, string $unitSlug)
    {
        $project = Project::with([
            'builder',
            'location',
            'propertyCategory',
            'images',
            'amenities',
            'units.tenant',
            'units.features',
            'units.images',
        ])
        ->where('slug', $projectSlug)
        ->where('status', true)
        ->firstOrFail();

        $unit = $project->units()
            ->with(['tenant', 'features', 'images'])
            ->where('slug', $unitSlug)
            ->where('status', true)
            ->firstOrFail();

        return view(
            'frontend.catalog.show',
            compact('project', 'unit')
        );
    }
}