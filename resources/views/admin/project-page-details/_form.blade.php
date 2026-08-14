<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">
            Banner Details
        </h5>
    </div>

    <div class="card-body">

        {{-- Project --}}
        <div class="mb-3">

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
                                $projectPageDetail->project_id ?? ''
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


        <div class="row">

            {{-- First Yellow Heading --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    First Yellow Heading
                </label>

                <input
                    type="text"
                    name="first_yellow_heading"
                    class="form-control @error('first_yellow_heading') is-invalid @enderror"
                    value="{{ old(
                        'first_yellow_heading',
                        $projectPageDetail->first_yellow_heading ?? ''
                    ) }}"
                    placeholder="e.g. AIPL · Pre-Leased Commercial">

                @error('first_yellow_heading')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Second Yellow Heading --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Second Yellow Heading
                </label>

                <input
                    type="text"
                    name="second_yellow_heading"
                    class="form-control @error('second_yellow_heading') is-invalid @enderror"
                    value="{{ old(
                        'second_yellow_heading',
                        $projectPageDetail->second_yellow_heading ?? ''
                    ) }}">

                @error('second_yellow_heading')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- Project Name --}}
        <div class="mb-3">

            <label class="form-label">
                Project Name
            </label>

            <input
                type="text"
                name="project_name"
                class="form-control @error('project_name') is-invalid @enderror"
                value="{{ old(
                    'project_name',
                    $projectPageDetail->project_name ?? ''
                ) }}">

            @error('project_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Description --}}
        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                class="form-control @error('description') is-invalid @enderror">{{ old(
                    'description',
                    $projectPageDetail->description ?? ''
                ) }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Amount Start --}}
        <div class="mb-3">

            <label class="form-label">
                Amount Start
            </label>

            <input
                type="text"
                name="amount_start"
                class="form-control @error('amount_start') is-invalid @enderror"
                value="{{ old(
                    'amount_start',
                    $projectPageDetail->amount_start ?? ''
                ) }}"
                placeholder="e.g. ₹63.87 L*">

            @error('amount_start')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

</div>


<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">
            Project Statistics
        </h5>
    </div>

    <div class="card-body">

        {{-- Stat 1 --}}
        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 1 Value
                </label>

                <input
                    type="text"
                    name="stat_1_value"
                    class="form-control @error('stat_1_value') is-invalid @enderror"
                    value="{{ old(
                        'stat_1_value',
                        $projectPageDetail->stat_1_value ?? ''
                    ) }}"
                    placeholder="e.g. Day 1*">

                @error('stat_1_value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 1 Type
                </label>

                <input
                    type="text"
                    name="stat_1_type"
                    class="form-control @error('stat_1_type') is-invalid @enderror"
                    value="{{ old(
                        'stat_1_type',
                        $projectPageDetail->stat_1_type ?? ''
                    ) }}"
                    placeholder="e.g. Monthly payout">

                @error('stat_1_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- Stat 2 --}}
        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 2 Value
                </label>

                <input
                    type="text"
                    name="stat_2_value"
                    class="form-control @error('stat_2_value') is-invalid @enderror"
                    value="{{ old(
                        'stat_2_value',
                        $projectPageDetail->stat_2_value ?? ''
                    ) }}"
                    placeholder="e.g. 50+">

                @error('stat_2_value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 2 Type
                </label>

                <input
                    type="text"
                    name="stat_2_type"
                    class="form-control @error('stat_2_type') is-invalid @enderror"
                    value="{{ old(
                        'stat_2_type',
                        $projectPageDetail->stat_2_type ?? ''
                    ) }}"
                    placeholder="e.g. Top brands leased">

                @error('stat_2_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- Stat 3 --}}
        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 3 Value
                </label>

                <input
                    type="text"
                    name="stat_3_value"
                    class="form-control @error('stat_3_value') is-invalid @enderror"
                    value="{{ old(
                        'stat_3_value',
                        $projectPageDetail->stat_3_value ?? ''
                    ) }}"
                    placeholder="e.g. ₹63.87L*">

                @error('stat_3_value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 3 Type
                </label>

                <input
                    type="text"
                    name="stat_3_type"
                    class="form-control @error('stat_3_type') is-invalid @enderror"
                    value="{{ old(
                        'stat_3_type',
                        $projectPageDetail->stat_3_type ?? ''
                    ) }}"
                    placeholder="e.g. Investment starts @">

                @error('stat_3_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- Stat 4 --}}
        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 4 Value
                </label>

                <input
                    type="text"
                    name="stat_4_value"
                    class="form-control @error('stat_4_value') is-invalid @enderror"
                    value="{{ old(
                        'stat_4_value',
                        $projectPageDetail->stat_4_value ?? ''
                    ) }}"
                    placeholder="e.g. 15 Yr*">

                @error('stat_4_value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Statistic 4 Type
                </label>

                <input
                    type="text"
                    name="stat_4_type"
                    class="form-control @error('stat_4_type') is-invalid @enderror"
                    value="{{ old(
                        'stat_4_type',
                        $projectPageDetail->stat_4_type ?? ''
                    ) }}"
                    placeholder="e.g. Lease lock-in">

                @error('stat_4_type')
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
        <h5 class="mb-0">
            Co-Tenants / Brands
        </h5>
    </div>

    <div class="card-body">

        <div class="row">

            @php
                $selectedTenants = old(
                    'tenants',
                    isset($projectPageDetail)
                        ? $projectPageDetail
                            ->tenants
                            ->pluck('id')
                            ->toArray()
                        : []
                );
            @endphp

            @forelse($tenants as $tenant)

                <div class="col-md-4 col-lg-3 mb-3">

                    <div class="form-check">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="tenants[]"
                            value="{{ $tenant->id }}"
                            id="tenant{{ $tenant->id }}"

                            @checked(
                                in_array(
                                    $tenant->id,
                                    $selectedTenants
                                )
                            )>

                        <label
                            class="form-check-label"
                            for="tenant{{ $tenant->id }}">

                            {{ $tenant->name }}

                            @if($tenant->business_category)

                                <small class="text-muted d-block">

                                    {{ $tenant->business_category }}

                                </small>

                            @endif

                        </label>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info mb-0">

                        No active tenants / brands available.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>


<div class="d-flex justify-content-end mb-4">

    <a
        href="{{ route('admin.project-page-details.index') }}"
        class="btn btn-secondary me-2">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        {{ isset($projectPageDetail)
            ? 'Update Project Page Details'
            : 'Save Project Page Details'
        }}

    </button>

</div>