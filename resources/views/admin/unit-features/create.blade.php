@extends('layouts.admin')

@section('title', 'Add Unit Feature')

@section('content')

<div class="mb-4">

    <h2>Add Unit Feature</h2>

    <p class="text-muted">

        Create a new Unit Feature.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.unit-features.store') }}">

    @csrf

    @include('admin.unit-features._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Unit Feature

        </button>

        <a
            href="{{ route('admin.unit-features.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection