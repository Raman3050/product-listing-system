@extends('layouts.admin')

@section('title', 'Edit Builder')

@section('content')

<div class="mb-4">

    <h2>Edit Builder</h2>

    <p class="text-muted">

        Update Builder details.

    </p>

</div>

<form
    method="POST"
    enctype="multipart/form-data"
    action="{{ route('admin.builders.update', $builder) }}">

    @csrf
    @method('PUT')

    @include('admin.builders._form')

    <div class="mt-4">

        <button class="btn btn-primary">

            Update Builder

        </button>

        <a href="{{ route('admin.builders.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </div>

</form>

@endsection