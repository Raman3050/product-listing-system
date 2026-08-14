<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitFeatureRequest;
use App\Http\Requests\UpdateUnitFeatureRequest;
use App\Models\UnitFeature;
use Illuminate\Http\Request;

class UnitFeatureController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $unitFeatures = UnitFeature::query()

            ->when($request->filled('search'), function ($query) use ($request) {

                $query->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                );

            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();

        return view(
            'admin.unit-features.index',
            compact(
                'unitFeatures',
                'perPage'
            )
        );
    }

    public function create()
    {
        return view('admin.unit-features.create');
    }

    public function store(StoreUnitFeatureRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = !empty($validated['slug'])
            ? $validated['slug']
            : SlugHelper::generate(
                $validated['name'],
                UnitFeature::class
            );

        $validated['status'] = $request->boolean('status');

        UnitFeature::create($validated);

        return redirect()
            ->route('admin.unit-features.index')
            ->with(
                'success',
                'Unit Feature created successfully.'
            );
    }

    public function edit(UnitFeature $unitFeature)
    {
        return view(
            'admin.unit-features.edit',
            compact('unitFeature')
        );
    }

    public function update(
        UpdateUnitFeatureRequest $request,
        UnitFeature $unitFeature
    ) {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $unitFeature->update($validated);

        return redirect()
            ->route('admin.unit-features.index')
            ->with(
                'success',
                'Unit Feature updated successfully.'
            );
    }

    public function destroy(UnitFeature $unitFeature)
    {
        $unitFeature->delete();

        return redirect()
            ->route('admin.unit-features.index')
            ->with(
                'success',
                'Unit Feature deleted successfully.'
            );
    }
}