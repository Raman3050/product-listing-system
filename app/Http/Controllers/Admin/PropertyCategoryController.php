<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use App\Helpers\SlugHelper;
use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;

class PropertyCategoryController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $propertyCategories = PropertyCategory::query()

            ->when(request('search'), function ($query) {

                $query->where('name', 'like', '%' . request('search') . '%');

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.property-categories.index',
            compact('propertyCategories', 'perPage')
        );
    }

    public function create()
    {
        return view('admin.property-categories.create');
    }

    public function store(StorePropertyCategoryRequest $request)
    {
        $validated = $request->validated();

        // Generate slug if user leaves it empty
        $validated['slug'] = !empty($validated['slug'])
            ? SlugHelper::generate($validated['slug'], PropertyCategory::class)
            : SlugHelper::generate($validated['name'], PropertyCategory::class);

        // Checkbox handling
        $validated['status'] = $request->boolean('status');

        PropertyCategory::create($validated);

        return redirect()
            ->route('admin.property-categories.index')
            ->with('success', 'Property Category created successfully.');
    }

    public function edit(PropertyCategory $propertyCategory)
    {
        return view(
            'admin.property-categories.edit',
            compact('propertyCategory')
        );
    }

    public function update(UpdatePropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $propertyCategory->update($validated);

        return redirect()
            ->route('admin.property-categories.index')
            ->with('success', 'Property Category updated successfully.');
    }

    public function destroy(PropertyCategory $propertyCategory)
    {
        $propertyCategory->delete();

        return redirect()
            ->route('admin.property-categories.index')
            ->with('success', 'Property Category deleted successfully.');
    }
}