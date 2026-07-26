<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Models\PropertyCategory;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $propertyTypes = PropertyType::with('propertyCategory')

            ->when(request('search'), function ($query) {

                $query->where('name', 'like', '%' . request('search') . '%');

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.property-types.index',
            compact('propertyTypes', 'perPage')
        );
    }

    public function create()
    {
        $propertyCategories = PropertyCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.property-types.create',
            compact('propertyCategories')
        );
    }

    public function store(StorePropertyTypeRequest $request)
    {
        $validated = $request->validated();

        // Generate slug if left blank
        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate($validated['name'], PropertyType::class);

        $validated['status'] = $request->boolean('status');

        PropertyType::create($validated);

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property Type created successfully.');
    }

    public function edit(PropertyType $propertyType)
    {
        $propertyCategories = PropertyCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.property-types.edit',
            compact('propertyType', 'propertyCategories')
        );
    }

    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $propertyType->update($validated);

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property Type updated successfully.');
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();

        return redirect()
            ->route('admin.property-types.index')
            ->with('success', 'Property Type deleted successfully.');
    }
}