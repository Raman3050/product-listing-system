@extends('layouts.admin')

@section('title', 'Create Property Unit Banner')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Create Property Unit Banner</h4>
                <a href="{{ route('admin.home-page-banners.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>

            <form method="POST" action="{{ route('admin.home-page-banners.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.home-page-details.banners._form')
            </form>

        </div>

    </div>

</div>

@endsection
