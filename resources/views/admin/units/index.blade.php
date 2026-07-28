@extends('layouts.admin')

@section('title', 'Units')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header">

            <h4 class="mb-0">
                Units
            </h4>

        </div>

        <div class="card-body">

            {{-- Filters --}}
            <form
                method="GET"
                action="{{ route('admin.units.index') }}">

                <div class="row mb-4">

                    {{-- Search --}}
                    <div class="col-md-3">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search Unit..."
                            value="{{ request('search') }}">

                    </div>

                    {{-- Project --}}
                    <div class="col-md-2">

                        <select
                            name="project_id"
                            class="form-select">

                            <option value="">
                                All Projects
                            </option>

                            @foreach($projects as $project)

                                <option
                                    value="{{ $project->id }}"
                                    @selected(request('project_id') == $project->id)>

                                    {{ $project->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Property Type --}}
                    <div class="col-md-2">

                        <select
                            name="property_type_id"
                            class="form-select">

                            <option value="">
                                Property Type
                            </option>

                            @foreach($propertyTypes as $type)

                                <option
                                    value="{{ $type->id }}"
                                    @selected(request('property_type_id') == $type->id)>

                                    {{ $type->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Status --}}
                    <div class="col-md-2">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">
                                All Status
                            </option>

                            <option
                                value="1"
                                @selected(request('status') === '1')>

                                Active

                            </option>

                            <option
                                value="0"
                                @selected(request('status') === '0')>

                                Inactive

                            </option>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <button
                            class="btn btn-primary">

                            Search

                        </button>

                        <a
                            href="{{ route('admin.units.index') }}"
                            class="btn btn-secondary">

                            Reset

                        </a>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-2">

                        <select
                            name="per_page"
                            class="form-select"
                            onchange="this.form.submit()">

                            <option value="10" @selected(request('per_page',10)==10)>
                                10 Records
                            </option>

                            <option value="25" @selected(request('per_page')==25)>
                                25 Records
                            </option>

                            <option value="50" @selected(request('per_page')==50)>
                                50 Records
                            </option>

                            <option value="100" @selected(request('per_page')==100)>
                                100 Records
                            </option>

                        </select>

                    </div>

                    <div class="col-md-10 text-end">

                        <a
                            href="{{ route('admin.units.create') }}"
                            class="btn btn-success">

                            Add Unit

                        </a>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="70">ID</th>

                            <th>Unit</th>

                            <th>Project</th>

                            <th>Property Type</th>

                            <th>Price</th>

                            <th width="100">Status</th>

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($units as $unit)

                        <tr>

                            <td>
                                {{ $unit->id }}
                            </td>

                            <td>

                                <strong>

                                    {{ $unit->name }}

                                </strong>

                            </td>

                            <td>

                                {{ $unit->project->name }}

                            </td>

                            <td>

                                {{ $unit->propertyType->name }}

                            </td>

                            <td>

                                @if($unit->price_on_request)

                                    <span class="badge bg-warning text-dark">

                                        Price On Request

                                    </span>

                                @elseif($unit->price)

                                    ₹{{ number_format($unit->price,2) }}

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                @if($unit->status)

                                    <span class="badge bg-success">

                                        Active

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Inactive

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.units.edit',$unit) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.units.destroy',$unit) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this unit?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center">

                                No Units Found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            {{ $units->links() }}

        </div>

    </div>

</div>

@endsection