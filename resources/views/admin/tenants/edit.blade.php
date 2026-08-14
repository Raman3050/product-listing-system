@extends('layouts.admin')

@section('title', 'Edit Tenant / Brand')

@section('content')

<div class="mb-4">

    <h2>Edit Tenant / Brand</h2>

    <p class="text-muted">

        Update Tenant / Brand details.

    </p>

</div>

<form
    method="POST"
    enctype="multipart/form-data"
    action="{{ route('admin.tenants.update', $tenant) }}">

    @csrf
    @method('PUT')

    @include('admin.tenants._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Tenant / Brand

        </button>

        <a href="{{ route('admin.tenants.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection