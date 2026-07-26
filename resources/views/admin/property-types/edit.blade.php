@extends('layouts.admin')

@section('title', 'Edit Property Type')

@section('content')

<div class="mb-4">

    <h2>Edit Property Type</h2>

    <p class="text-muted">

        Update property type details.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.property-types.update', $propertyType) }}">

    @csrf
    @method('PUT')

    @include('admin.property-types._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Property Type

        </button>

        <a
            href="{{ route('admin.property-types.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection