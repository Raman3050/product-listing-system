@extends('layouts.admin')

@section('title', 'Add Project Logo')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Add Project Logo</h4>
                <a href="{{ route('admin.home-page-logos.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-logos.store') }}">
                @csrf
                @include('admin.home-page-details.logos._form')
            </form>

        </div>

    </div>

</div>

@endsection
