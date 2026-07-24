@extends("layouts.admin")

@section("title", "Dashboard")

@php
$breadcrumbs = [
    ["label" => "Dashboard", "url" => route("admin.dashboard")]
];
@endphp

@section("content")

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">
                Welcome to the Property Listing Admin Panel
            </p>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Products</p>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="bi bi-box-seam fs-1 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Categories</p>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="bi bi-tags fs-1 text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Brands</p>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="bi bi-award fs-1 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Users</p>
                            <h3 class="mb-0">1</h3>
                        </div>
                        <i class="bi bi-people fs-1 text-danger"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Recent Activity</h5>
        </div>
        <div class="card-body">
            <p class="text-muted mb-0">
                No recent activity available.
            </p>
        </div>
    </div>

</div>

@endsection