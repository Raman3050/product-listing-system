@extends('layouts.admin')

@section('title', 'Add Property Type')

@section('content')

<div class="mb-4">

    <h2>Add Property Type</h2>

    <p class="text-muted">

        Create a new property type.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.property-types.store') }}">

    @csrf

    @include('admin.property-types._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Property Type

        </button>

        <a
            href="{{ route('admin.property-types.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection