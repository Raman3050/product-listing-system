@extends('layouts.admin')

@section('title', 'Add Location')

@section('content')

<div class="mb-4">

    <h2>Add Location</h2>

    <p class="text-muted">

        Create a new Location.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.locations.store') }}">

    @csrf

    @include('admin.locations._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Location

        </button>

        <a
            href="{{ route('admin.locations.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection