<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $locations = Location::query()

            ->when(request('search'), function ($query) {

                $query->where('name', 'like', '%' . request('search') . '%');

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.locations.index',
            compact('locations', 'perPage')
        );
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], Location::class);

        $validated['status'] = $request->boolean('status');

        Location::create($validated);

        return redirect()
            ->route('admin.locations.index')
            ->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $location->update($validated);

        return redirect()
            ->route('admin.locations.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()
            ->route('admin.locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}