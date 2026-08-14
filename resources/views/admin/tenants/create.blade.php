@extends('layouts.admin')

@section('title', 'Add Tenant / Brand')

@section('content')

<div class="mb-4">

    <h2>Add Tenant / Brand</h2>

    <p class="text-muted">

        Create a new Tenant / Brand.

    </p>

</div>

<form
    method="POST"
    action="{{ route('admin.tenants.store') }}"
    enctype="multipart/form-data">

    @csrf

    @include('admin.tenants._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Save Tenant / Brand

        </button>

        <a
            href="{{ route('admin.tenants.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection