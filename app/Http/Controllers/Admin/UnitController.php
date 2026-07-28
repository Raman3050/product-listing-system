<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\PropertyType;
use App\Models\Unit;
use Illuminate\Http\Request;


class UnitController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $units = Unit::with(['project', 'propertyType'])

            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhereHas('project', function ($project) use ($search) {
                            $project->where('name', 'like', "%{$search}%");
                        });

                });

            })

            ->when($request->filled('project_id'), function ($query) use ($request) {

                $query->where('project_id', $request->project_id);

            })

            ->when($request->filled('property_type_id'), function ($query) use ($request) {

                $query->where('property_type_id', $request->property_type_id);

            })

            ->when($request->filled('status'), function ($query) use ($request) {

                $query->where('status', $request->status);

            })

            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        $projects = Project::where('status', true)
            ->orderBy('name')
            ->get();

        $propertyTypes = PropertyType::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.units.index',
            compact(
                'units',
                'projects',
                'propertyTypes'
            )
        );
    }

    public function create()
    {
        $projects = Project::where('status', true)
            ->orderBy('name')
            ->get();

        $propertyTypes = PropertyType::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.units.create',
            compact(
                'projects',
                'propertyTypes'
            )
        );
    }

    public function store(StoreUnitRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], Unit::class);

        $validated['status'] = $request->boolean('status');

        $validated['price_on_request'] = $request->boolean('price_on_request');

        Unit::create($validated);

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        $projects = Project::where('status', true)->orderBy('name')->get();

        $propertyTypes = PropertyType::where('status', true)->orderBy('name')->get();

        return view(
            'admin.units.edit',
            compact(
                'unit',
                'projects',
                'propertyTypes'
            )
        );
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate(
                $validated['name'],
                Unit::class,
                $unit->id
            );

        $validated['status'] = $request->boolean('status');

        $validated['price_on_request'] = $request->boolean('price_on_request');

        $unit->update($validated);

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit updated successfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()
            ->route('admin.units.index')
            ->with('success', 'Unit deleted successfully.');
    }
}
