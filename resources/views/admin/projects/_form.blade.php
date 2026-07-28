<div class="card shadow-sm mb-4">

    <div class="card-header">
        Basic Information
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Project Name --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Project Name *
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $project->name ?? '') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Slug --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $project->slug ?? '') }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <small class="text-muted">
                    Leave blank for auto-generation
                </small>

            </div>

        </div>

        <div class="row">

            {{-- Category --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Category *
                </label>

                <select
                    name="property_category_id"
                    class="form-select">

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old(
                                'property_category_id',
                                $project->property_category_id ?? ''
                            ) == $category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Builder --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Builder *
                </label>

                <select
                    name="builder_id"
                    class="form-select">

                    <option value="">
                        Select Builder
                    </option>

                    @foreach($builders as $builder)

                        <option
                            value="{{ $builder->id }}"
                            @selected(old(
                                'builder_id',
                                $project->builder_id ?? ''
                            ) == $builder->id)>

                            {{ $builder->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Location --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Location *
                </label>

                <select
                    name="location_id"
                    class="form-select">

                    <option value="">
                        Select Location
                    </option>

                    @foreach($locations as $location)

                        <option
                            value="{{ $location->id }}"
                            @selected(old(
                                'location_id',
                                $project->location_id ?? ''
                            ) == $location->id)>

                            {{ $location->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                class="form-control">{{ old('description', $project->description ?? '') }}</textarea>

        </div>

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="status"
                value="1"
                {{ old('status', $project->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        Project Details
    </div>

    <div class="card-body">

        <div class="row">

            {{-- RERA Number --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    RERA Number
                </label>

                <input
                    type="text"
                    name="rera_number"
                    class="form-control @error('rera_number') is-invalid @enderror"
                    value="{{ old('rera_number', $project->rera_number ?? '') }}">

                @error('rera_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Possession Date --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Possession Date
                </label>

                <input
                    type="date"
                    name="possession_date"
                    class="form-control @error('possession_date') is-invalid @enderror"
                    value="{{ old('possession_date', isset($project) && $project->possession_date ? $project->possession_date->format('Y-m-d') : '') }}">

                @error('possession_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        <div class="row">

            {{-- Project Area --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Project Area
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="project_area"
                    class="form-control @error('project_area') is-invalid @enderror"
                    value="{{ old('project_area', $project->project_area ?? '') }}">

                @error('project_area')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Area Unit --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Area Unit
                </label>

                <select
                    name="area_unit"
                    class="form-select">

                    <option value="">Select Unit</option>

                    <option value="Acres"
                        @selected(old('area_unit', $project->area_unit ?? '') == 'Acres')>
                        Acres
                    </option>

                    <option value="Sq. Ft."
                        @selected(old('area_unit', $project->area_unit ?? '') == 'Sq. Ft.')>
                        Sq. Ft.
                    </option>

                    <option value="Sq. Yards"
                        @selected(old('area_unit', $project->area_unit ?? '') == 'Sq. Yards')>
                        Sq. Yards
                    </option>

                    <option value="Sq. Meters"
                        @selected(old('area_unit', $project->area_unit ?? '') == 'Sq. Meters')>
                        Sq. Meters
                    </option>

                </select>

            </div>

        </div>

        <div class="row">

            {{-- Total Towers --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Total Towers
                </label>

                <input
                    type="number"
                    min="0"
                    name="total_towers"
                    class="form-control @error('total_towers') is-invalid @enderror"
                    value="{{ old('total_towers', $project->total_towers ?? '') }}">

                @error('total_towers')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Total Units --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Total Units
                </label>

                <input
                    type="number"
                    min="0"
                    name="total_units"
                    class="form-control @error('total_units') is-invalid @enderror"
                    value="{{ old('total_units', $project->total_units ?? '') }}">

                @error('total_units')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        Media
    </div>

    <div class="card-body">

        <div class="row">
            
            <div class="col-md-4 mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/png, image/jpeg, image/webp, image/avif">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if(isset($project) && $project->logo)
                    <div class="mt-2">
                        <img src="{{ Storage::url($project->logo) }}" alt="Logo" class="img-thumbnail" width="100">
                    </div>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Featured Image</label>
                <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/png, image/jpeg, image/webp, image/avif">
                @error('featured_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if(isset($project) && $project->featured_image)
                    <div class="mt-2">
                        <img src="{{ Storage::url($project->featured_image) }}" alt="Featured Image" class="img-thumbnail" width="100">
                    </div>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Brochure</label>
                <input type="file" name="brochure" class="form-control @error('brochure') is-invalid @enderror" accept="application/pdf">
                @error('brochure')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if(isset($project) && $project->brochure)
                    <div class="mt-2">
                        <a href="{{ Storage::url($project->brochure) }}" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-file-earmark-pdf"></i> View Current</a>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        Amenities
    </div>

    <div class="card-body">

        <div class="row">

            @foreach($amenities as $amenity)

                <div class="col-md-3 mb-3">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="amenities[]"
                            value="{{ $amenity->id }}"
                            id="amenity{{ $amenity->id }}"

                            @checked(
                                in_array(
                                    $amenity->id,
                                    old(
                                        'amenities',
                                        isset($project)
                                            ? $project->amenities->pluck('id')->toArray()
                                            : []
                                    )
                                )
                            )>

                        <label
                            class="form-check-label"
                            for="amenity{{ $amenity->id }}">

                            @if($amenity->icon)
                                <i class="bi bi-{{ $amenity->icon }}"></i>
                            @endif

                            {{ $amenity->name }}

                        </label>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>


<div class="card shadow-sm mb-4">

    <div class="card-header">
        SEO
    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Meta Title
            </label>

            <input
                type="text"
                name="meta_title"
                class="form-control @error('meta_title') is-invalid @enderror"
                value="{{ old('meta_title', $project->meta_title ?? '') }}">

            @error('meta_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Meta Description
            </label>

            <input
                type="text"
                name="meta_description"
                class="form-control @error('meta_description') is-invalid @enderror"
                value="{{ old('meta_description', $project->meta_description ?? '') }}">

            @error('meta_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Meta Keywords
            </label>

            <input
                type="text"
                name="meta_keywords"
                class="form-control @error('meta_keywords') is-invalid @enderror"
                value="{{ old('meta_keywords', $project->meta_keywords ?? '') }}">

            @error('meta_keywords')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

</div>