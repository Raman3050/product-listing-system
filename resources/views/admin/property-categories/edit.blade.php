@extends('layouts.admin')

@section('title', 'Edit Property Category')

@section('content')

<div class="mb-4">

    <h2>Edit Property Category</h2>

    <p class="text-muted">

        Update property category details.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.property-categories.update', $propertyCategory) }}">

    @csrf
    @method('PUT')

    @include('admin.property-categories._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Property Category

        </button>

        <a href="{{ route('admin.property-categories.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection