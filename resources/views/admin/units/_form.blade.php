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
                            @selected(old('project_id', $unit->project_id ?? '') == $project->id)>

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
                            @selected(old('property_type_id', $unit->property_type_id ?? '') == $propertyType->id)>

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
                        @checked(old('status', $unit->status ?? true))>

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

            {{-- Booking Amount --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Booking Amount
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="booking_amount"
                    class="form-control @error('booking_amount') is-invalid @enderror"
                    value="{{ old('booking_amount', $unit->booking_amount ?? '') }}">

                @error('booking_amount')
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
                        @checked(old('price_on_request', $unit->price_on_request ?? false))>

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
        <h5 class="mb-0">Specifications</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Carpet Area --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Carpet Area</label>

                <input
                    type="number"
                    step="0.01"
                    name="carpet_area"
                    class="form-control @error('carpet_area') is-invalid @enderror"
                    value="{{ old('carpet_area', $unit->carpet_area ?? '') }}">

                @error('carpet_area')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Built-up Area --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Built-up Area</label>

                <input
                    type="number"
                    step="0.01"
                    name="builtup_area"
                    class="form-control @error('builtup_area') is-invalid @enderror"
                    value="{{ old('builtup_area', $unit->builtup_area ?? '') }}">

                @error('builtup_area')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Super Area --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Super Area</label>

                <input
                    type="number"
                    step="0.01"
                    name="super_area"
                    class="form-control @error('super_area') is-invalid @enderror"
                    value="{{ old('super_area', $unit->super_area ?? '') }}">

                @error('super_area')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Area Unit --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Area Unit</label>

                <select
                    name="area_unit"
                    class="form-select @error('area_unit') is-invalid @enderror">

                    <option value="">Select Unit</option>

                    <option value="Sq. Ft." @selected(old('area_unit', $unit->area_unit ?? '') == 'Sq. Ft.')>Sq. Ft.</option>

                    <option value="Sq. Yards" @selected(old('area_unit', $unit->area_unit ?? '') == 'Sq. Yards')>Sq. Yards</option>

                    <option value="Sq. Meters" @selected(old('area_unit', $unit->area_unit ?? '') == 'Sq. Meters')>Sq. Meters</option>

                    <option value="Acres" @selected(old('area_unit', $unit->area_unit ?? '') == 'Acres')>Acres</option>

                </select>

                @error('area_unit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Bedrooms --}}
            <div class="col-md-2 mb-3">

                <label class="form-label">Bedrooms</label>

                <input
                    type="number"
                    name="bedrooms"
                    class="form-control @error('bedrooms') is-invalid @enderror"
                    value="{{ old('bedrooms', $unit->bedrooms ?? '') }}">

                @error('bedrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Bathrooms --}}
            <div class="col-md-2 mb-3">

                <label class="form-label">Bathrooms</label>

                <input
                    type="number"
                    name="bathrooms"
                    class="form-control @error('bathrooms') is-invalid @enderror"
                    value="{{ old('bathrooms', $unit->bathrooms ?? '') }}">

                @error('bathrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Balconies --}}
            <div class="col-md-2 mb-3">

                <label class="form-label">Balconies</label>

                <input
                    type="number"
                    name="balconies"
                    class="form-control @error('balconies') is-invalid @enderror"
                    value="{{ old('balconies', $unit->balconies ?? '') }}">

                @error('balconies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Floor --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Floor</label>

                <input
                    type="number"
                    name="floor"
                    class="form-control @error('floor') is-invalid @enderror"
                    value="{{ old('floor', $unit->floor ?? '') }}">

                @error('floor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Total Floors --}}
            <div class="col-md-3 mb-3">

                <label class="form-label">Total Floors</label>

                <input
                    type="number"
                    name="total_floors"
                    class="form-control @error('total_floors') is-invalid @enderror"
                    value="{{ old('total_floors', $unit->total_floors ?? '') }}">

                @error('total_floors')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Facing --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">Facing</label>

                <select
                    name="facing"
                    class="form-select @error('facing') is-invalid @enderror">

                    <option value="">Select Facing</option>

                    <option value="North" @selected(old('facing', $unit->facing ?? '') == 'North')>North</option>
                    <option value="South" @selected(old('facing', $unit->facing ?? '') == 'South')>South</option>
                    <option value="East" @selected(old('facing', $unit->facing ?? '') == 'East')>East</option>
                    <option value="West" @selected(old('facing', $unit->facing ?? '') == 'West')>West</option>
                    <option value="North-East" @selected(old('facing', $unit->facing ?? '') == 'North-East')>North-East</option>
                    <option value="North-West" @selected(old('facing', $unit->facing ?? '') == 'North-West')>North-West</option>
                    <option value="South-East" @selected(old('facing', $unit->facing ?? '') == 'South-East')>South-East</option>
                    <option value="South-West" @selected(old('facing', $unit->facing ?? '') == 'South-West')>South-West</option>

                </select>

                @error('facing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

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

                <textarea
                    name="meta_description"
                    rows="4"
                    class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $unit->meta_description ?? '') }}</textarea>

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

                <textarea
                    name="meta_keywords"
                    rows="3"
                    class="form-control @error('meta_keywords') is-invalid @enderror">{{ old('meta_keywords', $unit->meta_keywords ?? '') }}</textarea>

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

