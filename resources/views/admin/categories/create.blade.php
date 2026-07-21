@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="mb-0">Create Category</h2>
        <small class="text-muted">
            Add a new product category
        </small>
    </div>

    <a href="{{ route('admin.categories.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Back

    </a>

</div>

@include('admin.categories._form', [
    'action' => route('admin.categories.store'),
    'method' => 'POST'
])

@endsection