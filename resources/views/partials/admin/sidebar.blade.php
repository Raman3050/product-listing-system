<aside class="sidebar">

    <div class="sidebar-logo">

        <h4>Property Listing</h4>

    </div>

    <ul class="sidebar-menu">

    <li>
        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>
    </li>

    <li class="sidebar-heading mt-4">
        Property Management
    </li>

    <li>
        <a href="{{ route('admin.projects.index') }}"
        class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <i class="bi bi-buildings"></i>
            Projects
        </a>
    </li>

    <li>
        <a href="{{ route('admin.project-images.index') }}"
            class="{{ request()->routeIs('admin.project-images.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            Project Images
        </a>
    </li>

    <li>
        <a href="{{ route('admin.project-page-details.index') }}"
        class="{{ request()->routeIs('admin.project-page-details.*') ? 'active' : '' }}">

            <i class="bi bi-layout-text-window-reverse"></i>

            Project Page Details

        </a>
    </li>

    <li>
        <a href="{{ route('admin.units.index') }}"
            class="{{ request()->routeIs('admin.units.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            Units
        </a>
    </li>

    <li>
        <a href="{{ route('admin.unit-images.index') }}"
            class="{{ request()->routeIs('admin.unit-images.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            Unit Images
        </a>
    </li>

    <li class="sidebar-heading mt-4">
        Master Data
    </li>

    <li>
        <a href="{{ route('admin.property-categories.index') }}"
            class="{{ request()->routeIs('admin.property-categories.*') ? 'active' : '' }}">
            <i class="bi bi-house"></i>
            Property Categories
        </a>
    </li>

    <li>
        <a href="{{ route('admin.property-types.index') }}"
            class="{{ request()->routeIs('admin.property-types.*') ? 'active' : '' }}">
            <i class="bi bi-house"></i>
            Property Types
        </a>
    </li>

    <li>
        <a href="{{ route('admin.builders.index') }}"
            class="{{ request()->routeIs('admin.builders.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            Builders
        </a>
    </li>

    <li>
        <a href="{{ route('admin.amenities.index') }}"
            class="{{ request()->routeIs('admin.amenities.*') ? 'active' : '' }}">
            <i class="bi bi-stars"></i>
            Amenities
        </a>
    </li>

    <li>
        <a href="{{ route('admin.locations.index') }}"
            class="{{ request()->routeIs('admin.locations.*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt"></i>
            Locations
        </a>
    </li>

    <li>
        <a href="{{ route('admin.tenants.index') }}"
        class="{{ request()->routeIs('admin.tenants.*') ? 'active' : '' }}">
            <i class="bi bi-shop"></i>
            Tenants / Brands
        </a>
    </li>

    <li>
        <a href="{{ route('admin.unit-features.index') }}"
        class="{{ request()->routeIs('admin.unit-features.*') ? 'active' : '' }}">
            <i class="bi bi-stars"></i>
            Unit Features
        </a>
    </li>

    <li class="sidebar-heading mt-4">
        Website
    </li>

    <li>
        <a href="{{ route('admin.home-page-banners.index') }}" class="{{ request()->routeIs('admin.home-page-banners.*') ? 'active' : '' }}">
            <i class="bi bi-window"></i>
            Home Page Details
        </a>
    </li>

    <li class="sidebar-heading mt-4">
        Settings
    </li>

    <li>
        <a href="#">
            <i class="bi bi-gear"></i>
            Settings
        </a>
    </li>

</ul>

</aside>