@extends('layouts.frontend')

@section('content')

<div class="container main-wrap inner-page">
  <div class="px-3 px-lg-0">

    <h1 class="inner-section-title mt-4">All Projects</h1>
    <p class="section-sub">Browse our available investment projects.</p>

    <div class="cards-grid" id="cardsGrid">

      @forelse($projects as $project)

        <div class="prop-card">

          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2">
                <span class="badge-status">{{ $project->propertyCategory?->name ?? 'Commercial' }}</span>
              </div>
            </div>
            <div class="brand-plaque">
              @if($project->logo)
                <img src="{{ Storage::url($project->logo) }}" alt="{{ $project->name }}">
              @else
                <span class="name">{{ $project->name }}</span>
              @endif
              <span class="loc">
                <i class="bi bi-geo-alt"></i>
                {{ $project->location?->name ?? '' }}
              </span>
            </div>
          </div>

          <div class="prop-body">
            <div class="card-actions">
              <div class="invest-tag">
                <span>{{ $project->builder?->name ?? '' }}</span>
              </div>
              <a href="{{ route('catalog.show', [$project->builder->slug, $project->slug]) }}" class="btn-view">View Project</a>
            </div>
          </div>

        </div>

      @empty

        <div class="col-12 text-center py-5">
          <i class="bi bi-search" style="font-size:2rem; color:var(--ink-soft);"></i>
          <p class="mt-2 mb-0 fw-semibold">No projects available</p>
        </div>

      @endforelse

    </div>

  </div>
</div>

@endsection
