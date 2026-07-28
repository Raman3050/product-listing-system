<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitImageRequest;
use App\Models\Unit;
use App\Models\UnitImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UnitImageController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::orderBy('name')->get();

        $selectedUnit = null;

        $images = collect();

        if ($request->filled('unit_id')) {

            $selectedUnit = Unit::findOrFail($request->unit_id);

            $images = UnitImage::where('unit_id', $selectedUnit->id)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
        }

        return view(
            'admin.unit-images.index',
            compact(
                'units',
                'selectedUnit',
                'images'
            )
        );
    }

    public function store(StoreUnitImageRequest $request)
    {
        DB::transaction(function () use ($request) {

            $unit = Unit::findOrFail($request->unit_id);

            $sortOrder = UnitImage::where('unit_id', $unit->id)
                ->max('sort_order') ?? 0;

            foreach ($request->file('images') as $image) {

                $path = $image->store(
                    'units/gallery',
                    'public'
                );

                UnitImage::create([

                    'unit_id' => $unit->id,

                    'image' => $path,

                    'sort_order' => ++$sortOrder,

                ]);

            }

        });

        return redirect()
            ->route('admin.unit-images.index', [
                'unit_id' => $request->unit_id
            ])
            ->with('success', 'Images uploaded successfully.');
    }

    public function destroy(UnitImage $unitImage)
    {
        if (
            $unitImage->image &&
            Storage::disk('public')->exists($unitImage->image)
        ) {
            Storage::disk('public')->delete($unitImage->image);
        }

        $unitId = $unitImage->unit_id;

        $unitImage->delete();

        return redirect()
            ->route('admin.unit-images.index', [
                'unit_id' => $unitId
            ])
            ->with('success', 'Image deleted successfully.');
    }
}
