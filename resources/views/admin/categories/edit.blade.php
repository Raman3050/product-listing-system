@extends('layouts.admin')

@section('title','Edit Category')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>Edit Category</h2>

        <small class="text-muted">
            Update category information
        </small>

    </div>

    <a href="{{ route('admin.categories.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</div>

@include('admin.categories._form',[
    'action'=>route('admin.categories.update',$category),
    'method'=>'PUT',
    'category'=>$category,
    'showSlug' => true,
])

@endsection