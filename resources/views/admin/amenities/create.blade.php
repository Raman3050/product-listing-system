@extends('layouts.admin')

@section('title', 'Add Amenity')

@section('content')

<div class="mb-4">

    <h2>Add Amenity</h2>

    <p class="text-muted">

        Create a new Amenity.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.amenities.store') }}">

    @csrf

    @include('admin.amenities._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Amenity

        </button>

        <a
            href="{{ route('admin.amenities.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection