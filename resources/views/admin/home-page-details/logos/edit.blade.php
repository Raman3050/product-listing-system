@extends('layouts.admin')

@section('title', 'Edit Project Logo')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Edit Project Logo</h4>
                <a href="{{ route('admin.home-page-logos.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-logos.update', $homePageLogo) }}">
                @csrf
                @method('PUT')
                @include('admin.home-page-details.logos._form', ['logo' => $homePageLogo])
            </form>

        </div>

    </div>

</div>

@endsection
