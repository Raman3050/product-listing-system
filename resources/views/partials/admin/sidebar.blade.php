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
        <a href="#">
            <i class="bi bi-buildings"></i>
            Properties
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
        <a href="#">
            <i class="bi bi-building"></i>
            Builders
        </a>
    </li>

    <li>
        <a href="#">
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

    <li class="sidebar-heading mt-4">
        Website
    </li>

    <li>
        <a href="#">
            <i class="bi bi-images"></i>
            Banners
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