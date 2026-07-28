@extends('layouts.admin')

@section('title','Edit Unit')

@section('content')

<div class="container-fluid">

    <form
        action="{{ route('admin.units.update',$unit) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('admin.units._form')

    </form>

</div>

@endsection