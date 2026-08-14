<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">Basic Information</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Project --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Project <span class="text-danger">*</span>
                </label>

                <select
                    name="project_id"
                    class="form-select @error('project_id') is-invalid @enderror">

                    <option value="">
                        Select Project
                    </option>

                    @foreach($projects as $project)

                        <option
                            value="{{ $project->id }}"
                            @selected(
                                old(
                                    'project_id',
                                    $unit->project_id ?? ''
                                ) == $project->id
                            )>

                            {{ $project->name }}

                        </option>

                    @endforeach

                </select>

                @error('project_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Property Type --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Property Type <span class="text-danger">*</span>
                </label>

                <select
                    name="property_type_id"
                    class="form-select @error('property_type_id') is-invalid @enderror">

                    <option value="">
                        Select Property Type
                    </option>

                    @foreach($propertyTypes as $propertyType)

                        <option
                            value="{{ $propertyType->id }}"
                            @selected(
                                old(
                                    'property_type_id',
                                    $unit->property_type_id ?? ''
                                ) == $propertyType->id
                            )>

                            {{ $propertyType->name }}

                        </option>

                    @endforeach

                </select>

                @error('property_type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Tenant / Brand --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tenant / Brand
                </label>

                <select
                    name="tenant_id"
                    class="form-select @error('tenant_id') is-invalid @enderror">

                    <option value="">
                        Select Tenant / Brand
                    </option>

                    @foreach($tenants as $tenant)

                        <option
                            value="{{ $tenant->id }}"
                            @selected(
                                old(
                                    'tenant_id',
                                    $unit->tenant_id ?? ''
                                ) == $tenant->id
                            )>

                            {{ $tenant->name }}

                        </option>

                    @endforeach

                </select>

                @error('tenant_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Unit Name --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Unit Name <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $unit->name ?? '') }}">

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
                    value="{{ old('slug', $unit->slug ?? '') }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <small class="text-muted">
                    Leave blank to generate automatically.
                </small>

            </div>


            {{-- Status --}}
            <div class="col-md-6 mb-3">

                <label class="form-label d-block">
                    Status
                </label>

                <div class="form-check form-switch mt-2">

                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="status"
                        name="status"
                        value="1"
                        @checked(
                            old(
                                'status',
                                $unit->status ?? true
                            )
                        )>

                    <label
                        class="form-check-label"
                        for="status">

                        Active

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">Pricing</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Price --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Price
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $unit->price ?? '') }}">

                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Price On Request --}}
            <div class="col-md-4 mb-3">

                <label class="form-label d-block">
                    Price On Request
                </label>

                <div class="form-check form-switch mt-2">

                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="price_on_request"
                        name="price_on_request"
                        value="1"
                        @checked(
                            old(
                                'price_on_request',
                                $unit->price_on_request ?? false
                            )
                        )>

                    <label
                        class="form-check-label"
                        for="price_on_request">

                        Enable

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">Investment Information</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Annual ROI --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Annual ROI (%)
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    max="100"
                    name="annual_roi"
                    class="form-control @error('annual_roi') is-invalid @enderror"
                    value="{{ old('annual_roi', $unit->annual_roi ?? '') }}"
                    placeholder="e.g. 5.64">

                @error('annual_roi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Lease Status --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Lease Status
                </label>

                <select
                    name="lease_status"
                    class="form-select @error('lease_status') is-invalid @enderror">

                    <option value="">
                        Select Lease Status
                    </option>

                    <option
                        value="Pre-Leased"
                        @selected(
                            old(
                                'lease_status',
                                $unit->lease_status ?? ''
                            ) === 'Pre-Leased'
                        )>

                        Pre-Leased

                    </option>

                    <option
                        value="Vacant"
                        @selected(
                            old(
                                'lease_status',
                                $unit->lease_status ?? ''
                            ) === 'Vacant'
                        )>

                        Vacant

                    </option>

                    <option
                        value="Available"
                        @selected(
                            old(
                                'lease_status',
                                $unit->lease_status ?? ''
                            ) === 'Available'
                        )>

                        Available

                    </option>

                </select>

                @error('lease_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Lock-in --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Lock-in Period (Years)
                </label>

                <input
                    type="number"
                    min="0"
                    name="lock_in_years"
                    class="form-control @error('lock_in_years') is-invalid @enderror"
                    value="{{ old('lock_in_years', $unit->lock_in_years ?? '') }}">

                @error('lock_in_years')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Monthly Rental --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Monthly Rental
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="monthly_rental"
                    class="form-control @error('monthly_rental') is-invalid @enderror"
                    value="{{ old('monthly_rental', $unit->monthly_rental ?? '') }}">

                @error('monthly_rental')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Minimum Rental --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Minimum Rental
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="minimum_rental"
                    class="form-control @error('minimum_rental') is-invalid @enderror"
                    value="{{ old('minimum_rental', $unit->minimum_rental ?? '') }}">

                @error('minimum_rental')
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
        <h5 class="mb-0">Unit Size</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Floor Size / Area --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Floor Size / Area
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="floor_size"
                    class="form-control @error('floor_size') is-invalid @enderror"
                    value="{{ old('floor_size', $unit->floor_size ?? '') }}"
                    placeholder="e.g. 1000">

                @error('floor_size')
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
                    name="floor_size_unit"
                    class="form-select @error('floor_size_unit') is-invalid @enderror">

                    <option value="">
                        Select Unit
                    </option>

                    <option
                        value="Sq. Ft."
                        @selected(
                            old(
                                'floor_size_unit',
                                $unit->floor_size_unit ?? ''
                            ) == 'Sq. Ft.'
                        )>

                        Sq. Ft.

                    </option>

                    <option
                        value="Sq. Yards"
                        @selected(
                            old(
                                'floor_size_unit',
                                $unit->floor_size_unit ?? ''
                            ) == 'Sq. Yards'
                        )>

                        Sq. Yards

                    </option>

                    <option
                        value="Sq. Meters"
                        @selected(
                            old(
                                'floor_size_unit',
                                $unit->floor_size_unit ?? ''
                            ) == 'Sq. Meters'
                        )>

                        Sq. Meters

                    </option>

                </select>

                @error('floor_size_unit')
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
        <h5 class="mb-0">Unit Features</h5>
    </div>

    <div class="card-body">

        <div class="row">

            @foreach($unitFeatures as $feature)

                <div class="col-md-4 col-lg-3 mb-3">

                    <div class="form-check">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="features[]"
                            value="{{ $feature->id }}"
                            id="feature{{ $feature->id }}"

                            @checked(
                                in_array(
                                    $feature->id,
                                    old(
                                        'features',
                                        isset($unit)
                                            ? $unit->features
                                                ->pluck('id')
                                                ->toArray()
                                            : []
                                    )
                                )
                            )>

                        <label
                            class="form-check-label"
                            for="feature{{ $feature->id }}">

                            {{ $feature->name }}

                        </label>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">Description</h5>
    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="6"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $unit->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">SEO Information</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Meta Title --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Meta Title
                </label>

                <input
                    type="text"
                    name="meta_title"
                    class="form-control @error('meta_title') is-invalid @enderror"
                    value="{{ old('meta_title', $unit->meta_title ?? '') }}">

                @error('meta_title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Meta Description --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Meta Description
                </label>

                <input
                    type="text"
                    name="meta_description"
                    class="form-control @error('meta_description') is-invalid @enderror"
                    value="{{ old('meta_description', $unit->meta_description ?? '') }}">

                @error('meta_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Meta Keywords --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Meta Keywords
                </label>

                <input
                    type="text"
                    name="meta_keywords"
                    class="form-control @error('meta_keywords') is-invalid @enderror"
                    value="{{ old('meta_keywords', $unit->meta_keywords ?? '') }}">

                @error('meta_keywords')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </div>

</div>

<div class="d-flex justify-content-end mb-4">

    <a
        href="{{ route('admin.units.index') }}"
        class="btn btn-secondary me-2">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        {{ isset($unit) ? 'Update Unit' : 'Create Unit' }}

    </button>

</div>

